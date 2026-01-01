<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{

    protected $table = 'customer_address';
    protected $fillable = [
        'customer_id',
        'address_line1',
        'address_line2',
        'city',
        'state',
        'postal_code',
        'country',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
