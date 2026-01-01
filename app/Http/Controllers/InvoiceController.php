<?php

namespace App\Http\Controllers;

use App\Helpers\ActivityHelper;
use App\Helpers\ErrorHelper;
use App\Helpers\SquareHelper;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoicePayment;
use App\Models\Item;
use App\Models\Tax;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Square\Legacy\Models\CheckoutOptions;
use Square\Legacy\Models\CreateOrderRequest;
use Square\Legacy\Models\CreatePaymentLinkRequest;
use Square\Legacy\Models\Money;
use Square\Legacy\Models\Order;
use Square\Legacy\Models\OrderLineItem;
use Square\Legacy\SquareClient;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $invoices = Invoice::with('customer')
            ->when($request->filled('search'), function ($q) use ($request) {
                $search = $request->search;

                $q->where(function ($query) use ($search) {
                    $query->where('invoice_number', 'like', "%{$search}%")
                        ->orWhereHas('customer', function ($customerQuery) use ($search) {
                            $customerQuery->where('name', 'like', "%{$search}%")
                                ->orWhere('email', 'like', "%{$search}%");
                        });
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('invoices.index', compact('invoices'));
    }

    public function transaction(Request $request)
    {
        $query = InvoicePayment::with('invoice.customer');

        if ($search = $request->get('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('transaction_reference', 'like', "%$search%")
                    ->orWhere('status', 'like', "%$search%")
                    ->orWhereHas('invoice', function ($q2) use ($search) {
                        $q2->where('invoice_number', 'like', "%$search%")
                            ->orWhereHas('customer', fn($q3) => $q3->where('name', 'like', "%$search%"));
                    });
            });
        }

        $payments = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('transactions.index', compact('payments'));
    }

    public function downloadReceipt(Invoice $invoice)
    {
        if (!$invoice->receipt_path || !Storage::disk('public')->exists($invoice->receipt_path)) {
            abort(404, 'Receipt not found.');
        }

        return Storage::disk('public')->download($invoice->receipt_path);
    }
    public function create()
    {
        return view('invoices.create', [
            'customers' => Customer::where('active', 1)->get(),
            'items' => Item::all(),
            'taxes' => Tax::where('active', 1)->get(),
        ]);


    }


    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'customer_id' => 'required|exists:customer,id',
                'items' => 'required|array|min:1',
                'items.*.item_id' => 'required|exists:items,id',
                'items.*.price' => 'required|numeric|min:0.01',
                'items.*.quantity' => 'required|integer|min:1',
                'taxes' => 'nullable|array',
                'taxes.*' => 'exists:taxes,id',
            ]);
            

            $subTotal = collect($request->items)
                ->sum(fn($i) => $i['price'] * $i['quantity']);

            if ($subTotal <= 0) {
                throw new \Exception('Invoice total must be greater than zero.');
            }

            $taxData = calculateInvoiceTax($subTotal, $request->taxes ?? []);
            $taxTotal = $taxData['tax_total'];
            $grandTotal = $subTotal + $taxTotal;

            $invoiceNumber = 'INV-' . now()->format('YmdHis') . '-' . rand(100, 999);

            $invoice = Invoice::create([
                'customer_id' => $request->customer_id,
                'invoice_number' => $invoiceNumber,
                'sub_total' => $subTotal,
                'tax_total' => $taxTotal,
                'total' => $grandTotal,
                'grand_total' => $grandTotal,
                'status' => 'pending',
            ]);

            foreach ($request->items as $item) {
                $invoice->items()->create([
                    'item_id' => $item['item_id'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                ]);
            }

            foreach ($taxData['details'] as $tax) {
                $invoice->taxes()->attach($tax['tax_id'], [
                    'amount' => $tax['amount'],
                ]);
            }

            $config = SquareHelper::get();
            if (!$config || empty($config['location_id'])) {
                throw new \Exception('Square configuration or location ID missing');
            }

            $client = new SquareClient([
                'accessToken' => $config['access_token'],
                'environment' => $config['environment'], // sandbox / production
            ]);

            $lineItems = [];
            foreach ($request->items as $item) {
                $money = new Money();
                $money->setAmount((int) round($item['price'] * 100));
                $money->setCurrency('USD');

                $lineItem = new OrderLineItem((string) $item['quantity']);
                $lineItem->setName('Item #' . $item['item_id']);
                $lineItem->setBasePriceMoney($money);

                $lineItems[] = $lineItem;
            }

            $order = new Order($config['location_id']);
            $order->setLineItems($lineItems);
            $order->setReferenceId((string) $invoice->id); // 🔗 link invoice

            $checkout = new CheckoutOptions();
            $checkout->setRedirectUrl(route('invoices.show', $invoice->id));

            $paymentRequest = new CreatePaymentLinkRequest();
            $paymentRequest->setOrder($order);
            $paymentRequest->setCheckoutOptions($checkout);

            $response = $client->getCheckoutApi()->createPaymentLink($paymentRequest);

            if ($response->isError()) {
                throw new \Exception(json_encode($response->getErrors()));
            }

            $paymentLink = $response->getResult()->getPaymentLink();

            $invoice->update([
                'payment_link' => $paymentLink->getUrl(),
                'square_id' => $paymentLink->getOrderId(),
            ]);

            ActivityHelper::log(
                'CREATE',
                'INVOICE',
                $invoice->id,
                'Invoice created with tax and Square payment link'
            );

            DB::commit();

            return redirect()
                ->route('invoices.index')
                ->with('success', 'Invoice created successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            ErrorHelper::log('INVOICE_CREATE', $e);

            return back()
                ->withInput()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function show($id)
    {
        $invoice = Invoice::with([
            'customer.address',
            'items.item',
            'payments',
            'taxes'
        ])->findOrFail($id);

        return view('invoices.show', compact('invoice'));
    }

    public function sync($invoiceId)
    {
        $invoice = Invoice::with('items', 'customer')->findOrFail($invoiceId);

        if (!$invoice->payment_link) {
            return back()->withErrors(['error' => 'No payment link available for this invoice.']);
        }

        try {
            $config = SquareHelper::get();

            if (!$config || empty($config['location_id'])) {
                throw new \Exception('Square configuration or location ID missing');
            }

            $client = new SquareClient([
                'accessToken' => $config['access_token'],
                'environment' => $config['environment'],
            ]);

            $paymentsApi = $client->getPaymentsApi();
            $response = $paymentsApi->listPayments();

            if ($response->isError()) {
                throw new \Exception(json_encode($response->getErrors()));
            }

            $payments = $response->getResult()->getPayments();

            foreach ($payments as $payment) {
                if ($payment->getOrderId() === $invoice->square_id) {

                    $invoicePayment = InvoicePayment::updateOrCreate(
                        ['invoice_id' => $invoice->id, 'transaction_reference' => $payment->getId()],
                        [
                            'amount' => $payment->getAmountMoney()->getAmount() / 100,
                            'status' => $payment->getStatus(),
                            'payload' => json_encode($payment)
                        ]
                    );

                    // Update invoice status
                    if ($payment->getStatus() === 'COMPLETED' && $invoice->status !== 'paid') {
                        $invoice->update(['status' => 'paid']);

                        // ✅ Generate PDF receipt and save locally
                        $pdf = Pdf::loadView('invoices.receipt', compact('invoice'));
                        $filename = 'receipts/invoice_' . $invoice->id . '.pdf';

                        // Save to storage/app/public/receipts
                        Storage::disk('public')->put($filename, $pdf->output());

                        // Update invoice table with receipt path
                        $invoice->update(['receipt_path' => $filename]);
                    } elseif ($payment->getStatus() === 'PENDING' && $invoice->status !== 'pending') {
                        $invoice->update(['status' => 'pending']);
                    } elseif ($payment->getStatus() === 'FAILED' && $invoice->status !== 'pending') {
                        $invoice->update(['status' => 'failed']);

                        $pdf = Pdf::loadView('invoices.receipt', compact('invoice'));
                        $filename = 'receipts/invoice_' . $invoice->id . '.pdf';
                        Storage::disk('public')->put($filename, $pdf->output());
                        $invoice->update(['receipt_path' => $filename]);
                    }

                    ActivityHelper::log(
                        'SYNC',
                        'INVOICE',
                        $invoice->id,
                        'Invoice synced with Square payment status: ' . $payment->getStatus()
                    );

                    break; // assume 1 payment per invoice
                }
            }

            return back()->with('success', 'Invoice synced successfully.');

        } catch (\Exception $e) {
            ErrorHelper::log('INVOICE_SYNC', $e);
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}


