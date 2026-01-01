@extends('layout.app')

@section('content')

<div class="container">
    <h2 class="mb-4">Transactions</h2>

    <x:search :route="route('transactions.index')" :query="request()->get('search')" placeholder="Search transactions..." />

    <div class="card shadow border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Invoice</th>
                            <th>Customer</th>
                            <th>Transaction Ref</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Receipt</th> <!-- New column -->
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($payments as $payment)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $payment->invoice->invoice_number ?? '-' }}</td>
                                <td>{{ $payment->invoice->customer->name ?? '-' }}</td>
                                <td>{{ $payment->transaction_reference }}</td>
                                <td>${{ number_format($payment->amount, 2) }}</td>
                                <td>
                                    <span class="badge 
                                        {{ $payment->status === 'COMPLETED' ? 'bg-success' : ($payment->status === 'PENDING' ? 'bg-warning' : 'bg-secondary') }}">
                                        {{ ucfirst(strtolower($payment->status)) }}
                                    </span>
                                </td>
                                <td>{{ $payment->created_at->format('d M Y, H:i') }}</td>
                                <td>
                                    @if(isset($payment->invoice->receipt_path) && \Illuminate\Support\Facades\Storage::disk('public')->exists($payment->invoice->receipt_path))
                                        <a href="{{ route('invoices.receipt.download', $payment->invoice->id) }}" class="btn btn-sm btn-primary" target="_blank">
                                            Download
                                        </a>
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted">No transactions found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-3">
        {{ $payments->links('pagination::bootstrap-5') }}
    </div>
</div>

@endsection
