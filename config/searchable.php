<?php

return [
    'Customers' => [
        'table' => 'customer',
        'fields' => ['name', 'email'],
        'route' => 'customers.edit',
        'route_param' => 'id',
    ],
    'Invoices' => [
        'table' => 'invoices',
        'fields' => ['invoice_number'],
        'route' => 'invoices.show',
        'route_param' => 'id',
    ],
    'Items' => [
        'table' => 'items',
        'fields' => ['name', 'description'],
        'route' => 'items.edit',
        'route_param' => 'id',
    ],
     'Tax' => [
        'table' => 'taxes',
        'fields' => ['name'],
        'route' => 'taxes.index',
        'route_param' => 'id',
    ],
     'Transaction' => [
        'table' => 'invoice_payments',
        'fields' => ['transaction_reference'],
        'route' => 'transactions.index',
        'route_param' => 'id',
    ],
];
