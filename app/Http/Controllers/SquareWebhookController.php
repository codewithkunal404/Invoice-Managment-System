<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\InvoicePayment;
use App\Helpers\ActivityHelper;
use App\Helpers\ErrorHelper;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SquareWebhookController extends Controller
{
   public function handle(Request $request)
{
    $payload = $request->all();
    $type = $payload['type'] ?? '';

    Log::info('Square Webhook Received', $payload);

    try {
        if (in_array($type, ['payment.created', 'payment.updated'])) {
            $payment = $payload['data']['object']['payment'] ?? null;

            if ($payment) {
                $invoiceId = $payment['order_id'] ?? $payment['reference_id'] ?? null;
                $status    = $payment['status'] ?? null;
                $amount    = $payment['amount_money']['amount'] ?? 0;

                if ($invoiceId) {
                    $invoice = Invoice::where('square_id', $invoiceId)->first();

                    if ($invoice) {
                        // Update or create payment record
                        InvoicePayment::updateOrCreate(
                            ['transaction_reference' => $payment['id']],
                            [
                                'invoice_id' => $invoice->id,
                                'amount'     => $amount / 100,
                                'status'     => $status,
                                'payload'    => json_encode($payment),
                            ]
                        );

                        // Update invoice status
                        $invoiceStatusChanged = false;

                        if ($status === 'COMPLETED' && $invoice->status !== 'paid') {
                            $invoice->update(['status' => 'paid']);
                            $invoiceStatusChanged = true;
                        } elseif ($status === 'PENDING' && $invoice->status !== 'pending') {
                            $invoice->update(['status' => 'pending']);
                        } elseif ($status === 'FAILED' && $invoice->status !== 'failed') {
                            $invoice->update(['status' => 'failed']);
                        }

                        // Log activity
                        ActivityHelper::log(
                            'PAYMENT',
                            'INVOICE',
                            $invoice->id,
                            "Payment updated via Square webhook: $status"
                        );

                        // ✅ Generate PDF receipt only if paid
                        if ($status === 'COMPLETED' && $invoiceStatusChanged) {
                            $pdf = Pdf::loadView('invoices.receipt', compact('invoice'));
                            $fileName = 'invoices/Invoice-' . $invoice->invoice_number . '.pdf';

                            Storage::disk('public')->put($fileName, $pdf->output());

                            $invoice->update(['receipt_path' => $fileName]);
                        }
                        if ($status === 'FAILED' && $invoiceStatusChanged) {
                            $pdf = Pdf::loadView('invoices.receipt', compact('invoice'));
                            $fileName = 'invoices/Invoice-' . $invoice->invoice_number . '.pdf';

                            Storage::disk('public')->put($fileName, $pdf->output());

                            $invoice->update(['receipt_path' => $fileName]);
                        }
                    }
                }
            }
        }

        return response()->json(['success' => true]);

    } catch (\Exception $e) {
        ErrorHelper::log('SQUARE_WEBHOOK', $e);
        return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
    }
}
}
