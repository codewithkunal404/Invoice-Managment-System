<?php

use App\Models\Tax;

function calculateInvoiceTax(float $subTotal, array $taxIds = [])
{
    $taxTotal = 0;
    $taxDetails = [];

    $taxes = Tax::whereIn('id', $taxIds)->where('active', 1)->get();

    foreach ($taxes as $tax) {
        $amount = $tax->type === 'percent'
            ? ($subTotal * $tax->rate) / 100
            : $tax->rate;

        $taxTotal += $amount;

        $taxDetails[] = [
            'tax_id' => $tax->id,
            'amount' => round($amount, 2)
        ];
    }

    return [
        'tax_total' => round($taxTotal, 2),
        'details'   => $taxDetails
    ];
}