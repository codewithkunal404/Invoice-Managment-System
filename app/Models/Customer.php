<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    protected $table = 'customer';
    protected $fillable = [
        'name',
        'email',
        'phone_code',
        'phone',
        'active',
    ];
    public function address()
    {
        return $this->hasOne(CustomerAddress::class);
    }
}
