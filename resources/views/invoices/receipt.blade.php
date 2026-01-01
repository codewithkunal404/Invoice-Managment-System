<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice Receipt - {{ $invoice->invoice_number }}</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 13px;
            background: #fff;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            width: 90%;
            margin: auto;
            padding: 30px;
            position: relative;
        }

        /* Watermark */
        .watermark {
            position: fixed;
            top: 45%;
            left: 20%;
            font-size: 70px;
            color: rgba(0,0,0,0.05);
            transform: rotate(-30deg);
            z-index: -1;
            letter-spacing: 4px;
        }

        /* Header */
        .header {
            text-align: center;
            border-bottom: 2px solid #000;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .logo {
            max-height: 70px;
            margin-bottom: 8px;
        }

        .company-name {
            font-size: 20px;
            font-weight: bold;
        }

        .company-info {
            font-size: 12px;
            line-height: 1.5;
            color: #555;
        }

        /* Invoice Meta */
        .invoice-meta {
            margin-bottom: 20px;
        }

        .invoice-meta table {
            width: 100%;
            border-collapse: collapse;
        }

        .invoice-meta td {
            padding: 4px 0;
        }

        .status {
            padding: 4px 10px;
            font-size: 11px;
            border-radius: 4px;
            color: #fff;
            display: inline-block;
        }

        .paid { background: #28a745; }
        .pending { background: #ffc107; color: #000; }
        .failed { background: #dc3545; }

        /* Items Table */
        table.items {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        table.items th, table.items td {
            border: 1px solid #000;
            padding: 8px;
            font-size: 12px;
        }

        table.items th {
            background: #f5f5f5;
            text-align: left;
        }

        table.items td.right,
        table.items th.right {
            text-align: right;
        }

        /* Totals */
        .totals {
            width: 40%;
            float: right;
            margin-top: 15px;
        }

        .totals table {
            width: 100%;
            border-collapse: collapse;
        }

        .totals td {
            padding: 6px;
            font-size: 12px;
        }

        .totals .label {
            text-align: left;
        }

        .totals .amount {
            text-align: right;
        }

        .totals .grand {
            font-weight: bold;
            border-top: 2px solid #000;
            font-size: 14px;
        }

        /* Footer */
        .footer {
            clear: both;
            margin-top: 60px;
            text-align: center;
            font-size: 11px;
            color: #666;
        }
    </style>
</head>

<body>

<div class="watermark">{{ company_name() ?? 'RECEIPT' }}</div>

<div class="container">

    {{-- HEADER --}}
    <div class="header">
        @if(company_logo_path())
            <img src="{{ company_logo_path() }}" class="logo">
        @endif

        <div class="company-name">{{ company_name() }}</div>
        <div class="company-info">
            {{ company()->address ?? '' }}<br>
            {{ company()->state ?? '' }}, {{ company()->country ?? '' }}<br>
            Email: {{ company()->email ?? '' }} | Phone: {{ company()->phone ?? '' }}
        </div>
    </div>

    {{-- INVOICE META --}}
    <div class="invoice-meta">
        <table>
            <tr>
                <td><strong>Invoice #:</strong> {{ $invoice->invoice_number }}</td>
                <td align="right">
                    <span class="status {{ $invoice->status }}">
                        {{ strtoupper($invoice->status) }}
                    </span>
                </td>
            </tr>
            <tr>
                <td><strong>Customer:</strong> {{ $invoice->customer->name }}</td>
                <td align="right"><strong>Date:</strong> {{ $invoice->created_at->format('d M Y') }}</td>
            </tr>
            <tr>
                <td><strong>Email:</strong> {{ $invoice->customer->email }}</td>
                <td></td>
            </tr>
        </table>
    </div>

    {{-- ITEMS --}}
    <table class="items">
        <thead>
            <tr>
                <th>#</th>
                <th>Description</th>
                <th class="right">Price</th>
                <th class="right">Qty</th>
                <th class="right">Amount</th>
            </tr>
        </thead>
        <tbody>
            @php $subtotal = 0; @endphp
            @foreach($invoice->items as $i => $item)
                @php
                    $line = $item->price * $item->quantity;
                    $subtotal += $line;
                @endphp
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $item->item->name }}</td>
                    <td class="right">${{ number_format($item->price, 2) }}</td>
                    <td class="right">{{ $item->quantity }}</td>
                    <td class="right">${{ number_format($line, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- TOTALS --}}
    <div class="totals">
        <table>
            <tr>
                <td class="label">Subtotal</td>
                <td class="amount">${{ number_format($subtotal, 2) }}</td>
            </tr>

            @php $taxTotal = 0; @endphp
            @foreach($invoice->taxes as $tax)
                @php
                    $taxAmount = $tax->type === 'percent'
                        ? ($subtotal * $tax->rate / 100)
                        : $tax->rate;
                    $taxTotal += $taxAmount;
                @endphp
                <tr>
                    <td class="label">
                        {{ $tax->name }}
                        @if($tax->type === 'percent')
                            ({{ $tax->rate }}%)
                        @endif
                    </td>
                    <td class="amount">${{ number_format($taxAmount, 2) }}</td>
                </tr>
            @endforeach

            <tr class="grand">
                <td class="label">Grand Total</td>
                <td class="amount">${{ number_format($invoice->total, 2) }}</td>
            </tr>
        </table>
    </div>

    {{-- FOOTER --}}
    <div class="footer">
        Thank you for your business.<br>
        This is a system-generated receipt and does not require a signature.
    </div>

</div>

</body>
</html>
