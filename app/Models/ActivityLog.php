<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $table = 'activity_logs';
    protected $fillable = [
        'action',
        'module',
        'record_id',
        'description',
        'ip_address',
    ];
}
