@extends('layout.app')

@section('content')

    <style>
        .page-title {
            font-weight: 600;
        }
        .badge-paid {
            background-color: #28a745;
        }
        .badge-pending {
            background-color: #ffc107;
            color: #000;
        }
        .badge-failed {
            background-color: #dc3545;
        }
    </style>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="page-title">Invoices</h2>

            <a href="{{ route('invoices.create') }}" class="btn btn-primary">
                + Create Invoice
            </a>
        </div>

        <!-- Search -->
        <x-search
            :route="route('invoices.index')"
            :query="request('search')"
            placeholder="Search by invoice number or customer"
        />

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">

                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Invoice No</th>
                                <th>Customer</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th width="220">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($invoices as $invoice)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="fw-semibold">
                                        {{ $invoice->invoice_number }}
                                    </td>
                                    <td>
                                        {{ $invoice->customer->name }}
                                        <div class="text-muted small">
                                            {{ $invoice->customer->email }}
                                        </div>
                                    </td>
                                    <td>
                                        ${{ number_format($invoice->total, 2) }}
                                    </td>
                                    <td>
                                        <span class="badge 
                                            {{ $invoice->status === 'paid' ? 'badge-paid' : '' }}
                                            {{ $invoice->status === 'pending' ? 'badge-pending' : '' }}
                                            {{ $invoice->status === 'failed' ? 'badge-failed' : '' }}">
                                            {{ strtoupper($invoice->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        {{ $invoice->created_at->format('d M Y') }}
                                    </td>
                               <td>
    @if($invoice->status === 'paid' && $invoice->receipt_path)
        <a href="{{ route('invoices.receipt.download', $invoice->id) }}"
           class="btn btn-sm btn-primary">
            <i class="bi bi-download me-1"></i> 
        </a>
    @elseif($invoice->payment_link)
        <a href="{{ $invoice->payment_link }}"
           target="_blank"
           class="btn btn-sm btn-success">
            <i class="bi bi-credit-card me-1"></i> 
        </a>
    @endif

    <a href="{{ route('invoices.show', $invoice->id) }}"
       class="btn btn-sm btn-info">
        <i class="bi bi-eye me-1"></i> 
    </a>

    <a href="{{ route('invoices.sync', $invoice->id) }}"
       class="btn btn-sm btn-secondary">
        <i class="bi bi-arrow-repeat me-1"></i> 
    </a>
</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-muted">
                                        No invoices found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-3">
            {{ $invoices->links('pagination::bootstrap-5') }}
        </div>
    </div>

@endsection
