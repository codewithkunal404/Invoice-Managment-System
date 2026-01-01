<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ErrorLog extends Model
{
    protected $table = 'error_logs';
    protected $fillable = [
        'module',
        'error_type',
        'message',
        'trace',
        'ip_address',
    ];
}
