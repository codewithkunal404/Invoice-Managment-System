@extends('layout.app')

@section('content')

<style>
    .page-title { font-weight: 600; }
    .card-header {
        background: linear-gradient(135deg, #1e3c72, #2a5298);
        color: #fff;
    }
    .table td, .table th { vertical-align: middle; }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <h2 class="page-title mb-4">Create Invoice</h2>

            <div class="card shadow border-0">
                <div class="card-header">Invoice Details</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('invoices.store') }}">
                        @csrf

                        <!-- CUSTOMER -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Customer</label>
                                <select name="customer_id" class="form-control" required>
                                    <option value="">-- Select Customer --</option>
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}">
                                            {{ $customer->name }} ({{ $customer->email }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <hr>

                        <!-- ITEMS -->
                        <h5 class="mb-3 text-primary">Invoice Items</h5>

                        <div class="table-responsive">
                            <table class="table table-bordered" id="itemsTable">
                                <thead class="table-light">
                                    <tr>
                                        <th>Item</th>
                                        <th width="120">Price</th>
                                        <th width="100">Qty</th>
                                        <th width="120">Total</th>
                                        <th width="60"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <select name="items[0][item_id]" class="form-control item-select">
                                                <option value="">Select Item</option>
                                                @foreach($items as $item)
                                                    <option value="{{ $item->id }}"
                                                            data-price="{{ $item->price }}">
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="items[0][price]"
                                                   class="form-control price" readonly>
                                        </td>
                                        <td>
                                            <input type="number" name="items[0][quantity]"
                                                   class="form-control qty" value="1" min="1">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control line-total" readonly>
                                        </td>
                                        <td>
                                            <button type="button"
                                                    class="btn btn-danger btn-sm remove-row">×</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <button type="button" class="btn btn-outline-primary mb-3" id="addRow">
                            + Add Item
                        </button>

                        <hr>

                        <!-- TAXES -->
                        <h5 class="mb-3 text-primary">Apply Taxes</h5>

                        @foreach($taxes as $tax)
                            <div class="form-check mb-2">
                                <input class="form-check-input tax-checkbox"
                                       type="checkbox"
                                       name="taxes[]"
                                       value="{{ $tax->id }}"
                                       data-type="{{ $tax->type }}"
                                       data-value="{{ $tax->rate }}">
                                <label class="form-check-label">
                                    {{ $tax->name }}
                                    @if($tax->type === 'percent')
                                        ({{ $tax->rate }}%)
                                    @else
                                        (${{ number_format($tax->rate, 2) }})
                                    @endif
                                </label>
                            </div>
                        @endforeach

                        <hr>

                        <!-- TOTALS -->
                        <div class="row justify-content-end">
                            <div class="col-md-4">

                                <div class="mb-2">
                                    <label class="form-label">Subtotal</label>
                                    <input type="text" class="form-control" id="subtotal" readonly>
                                </div>

                                <div class="mb-2">
                                    <label class="form-label">Tax Total</label>
                                    <input type="text" class="form-control" id="taxTotal" readonly>
                                </div>

                                <div class="mb-2">
                                    <label class="form-label fw-bold">Grand Total</label>
                                    <input type="text" name="total"
                                           class="form-control fw-bold"
                                           id="grandTotal" readonly>
                                </div>

                            </div>
                        </div>

                        <div class="text-end mt-4">
                            <a href="{{ route('invoices.index') }}"
                               class="btn btn-outline-secondary me-2">
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-primary px-4">
                                Create Invoice & Generate Payment Link
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- JS -->
<script>
let rowIndex = 1;

function calculateTotals() {
    let subtotal = 0;

    document.querySelectorAll('#itemsTable tbody tr').forEach(row => {
        const price = parseFloat(row.querySelector('.price').value || 0);
        const qty = parseInt(row.querySelector('.qty').value || 0);
        const total = price * qty;

        row.querySelector('.line-total').value = total.toFixed(2);
        subtotal += total;
    });

    let taxTotal = 0;

    document.querySelectorAll('.tax-checkbox:checked').forEach(tax => {
        const type = tax.dataset.type;
        const value = parseFloat(tax.dataset.value);

        if (type === 'percent') {
            taxTotal += (subtotal * value) / 100;
        } else {
            taxTotal += value;
        }
    });

    document.getElementById('subtotal').value = subtotal.toFixed(2);
    document.getElementById('taxTotal').value = taxTotal.toFixed(2);
    document.getElementById('grandTotal').value = (subtotal + taxTotal).toFixed(2);
}

// EVENTS
document.addEventListener('change', function (e) {
    if (e.target.classList.contains('item-select')) {
        const price = e.target.selectedOptions[0].dataset.price || 0;
        const row = e.target.closest('tr');
        row.querySelector('.price').value = price;
        calculateTotals();
    }

    if (e.target.classList.contains('tax-checkbox')) {
        calculateTotals();
    }
});

document.addEventListener('input', function (e) {
    if (e.target.classList.contains('qty')) {
        calculateTotals();
    }
});

document.getElementById('addRow').addEventListener('click', function () {
    const table = document.querySelector('#itemsTable tbody');
    const newRow = table.rows[0].cloneNode(true);

    newRow.querySelectorAll('input, select').forEach(input => {
        input.value = '';
        if (input.name) {
            input.name = input.name.replace(/\[\d+\]/, `[${rowIndex}]`);
        }
    });

    table.appendChild(newRow);
    rowIndex++;
});

document.addEventListener('click', function (e) {
    if (e.target.classList.contains('remove-row')) {
        const rows = document.querySelectorAll('#itemsTable tbody tr');
        if (rows.length > 1) {
            e.target.closest('tr').remove();
            calculateTotals();
        }
    }
});
</script>

@endsection
