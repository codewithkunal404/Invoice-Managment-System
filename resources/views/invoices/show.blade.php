@extends('layout.app')

@section('content')

<style>
    .page-title { font-weight: 600; }
    .card-header {
        background: linear-gradient(135deg, #1e3c72, #2a5298);
        color: #fff;
        font-weight: 600;
    }
    .badge-paid { background: #28a745; }
    .badge-pending { background: #ffc107; color: #000; }
    .badge-failed { background: #dc3545; }
    .total-row { font-size: 1.1rem; font-weight: 600; }
</style>

<div class="container">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="page-title">
            Invoice {{ $invoice->invoice_number }}
        </h2>

        <div>
            @if($invoice->status !== 'paid' && $invoice->payment_link)
                <a href="{{ $invoice->payment_link }}" target="_blank"
                   class="btn btn-success me-2">
                    <i class="bi bi-credit-card"></i> Pay Now
                </a>
            @endif

            @if($invoice->status === 'paid' && $invoice->receipt_path)
                <a href="{{ route('invoices.receipt.download', $invoice->id) }}"
                   class="btn btn-primary">
                    <i class="bi bi-download"></i> Download Receipt
                </a>
            @endif
        </div>
    </div>

    <div class="row">

        <!-- LEFT SIDE -->
        <div class="col-lg-8">

            <!-- INVOICE SUMMARY -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header">Invoice Summary</div>
                <div class="card-body">

                    <div class="row text-center">
                        <div class="col-md-4">
                            <strong>Status</strong><br>
                            <span class="badge
                                {{ $invoice->status === 'paid' ? 'badge-paid' : '' }}
                                {{ $invoice->status === 'pending' ? 'badge-pending' : '' }}
                                {{ $invoice->status === 'failed' ? 'badge-failed' : '' }}">
                                {{ strtoupper($invoice->status) }}
                            </span>
                        </div>

                        <div class="col-md-4">
                            <strong>Created On</strong><br>
                            {{ $invoice->created_at->format('d M Y') }}
                        </div>

                        <div class="col-md-4">
                            <strong>Grand Total</strong><br>
                            <span class="fs-4">
                                ${{ number_format($invoice->grand_total, 2) }}
                            </span>
                        </div>
                    </div>

                </div>
            </div>

            <!-- ITEMS -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header">Invoice Items</div>
                <div class="card-body p-0">

                    <table class="table table-bordered mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Item</th>
                                <th width="120">Price</th>
                                <th width="80">Qty</th>
                                <th width="140">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($invoice->items as $item)
                                <tr>
                                    <td>{{ $item->item->name }}</td>
                                    <td>${{ number_format($item->price, 2) }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>
                                        ${{ number_format($item->price * $item->quantity, 2) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

            <!-- TOTALS & TAX -->
            <div class="card shadow-sm border-0">
                <div class="card-header">Amount Summary</div>
                <div class="card-body">

                    <table class="table table-borderless mb-0">
                        <tr>
                            <td class="text-end">Subtotal</td>
                            <td class="text-end">
                                ${{ number_format($invoice->sub_total, 2) }}
                            </td>
                        </tr>

                        @foreach($invoice->taxes as $tax)
                            <tr>
                                <td class="text-end">
                                    {{ $tax->name }}
                                    @if($tax->type === 'percent')
                                        ({{ $tax->value }}%)
                                    @endif
                                </td>
                                <td class="text-end">
                                    ${{ number_format($tax->pivot->amount, 2) }}
                                </td>
                            </tr>
                        @endforeach

                        <tr class="border-top total-row">
                            <td class="text-end">Grand Total</td>
                            <td class="text-end">
                                ${{ number_format($invoice->grand_total, 2) }}
                            </td>
                        </tr>
                    </table>

                </div>
            </div>

        </div>

        <!-- RIGHT SIDE -->
        <div class="col-lg-4">

            <!-- CUSTOMER -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header">Customer</div>
                <div class="card-body">
                    <strong>{{ $invoice->customer->name }}</strong><br>
                    {{ $invoice->customer->email }}<br>
                    {{ $invoice->customer->phone ?? '-' }}
                </div>
            </div>

            <!-- PAYMENTS -->
            <div class="card shadow-sm border-0">
                <div class="card-header">Payment History</div>
                <div class="card-body p-0">

                    <table class="table table-sm mb-0">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($invoice->payments as $payment)
                                <tr>
                                    <td>{{ $payment->created_at->format('d M Y') }}</td>
                                    <td>${{ number_format($payment->amount, 2) }}</td>
                                    <td>{{ strtoupper($payment->status) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted py-3">
                                        No payments recorded
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>

        </div>

    </div>
</div>

@endsection
