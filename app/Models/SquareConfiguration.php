<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SquareConfiguration extends Model
{
    protected $fillable = [
        'merchant_name', 'config'
    ];

    protected $casts = [
        'config' => 'array', // automatically cast JSON to array
    ];
}
