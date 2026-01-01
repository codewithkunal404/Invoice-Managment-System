<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanySetting extends Model
{

    protected $table='company_settings';
    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'logo',
        'state',
        'country',

    
    ];
}
