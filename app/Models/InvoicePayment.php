<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoicePayment extends Model
{
    protected $table = 'invoice_payments';
    protected $fillable = [
        'invoice_id',
        'amount',
        'transaction_reference',
        'status',
        'payload',
        'created_at',
        'updated_at',
    ];
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }   

       protected $casts = [
        'payload' => 'array'
    ];
}
