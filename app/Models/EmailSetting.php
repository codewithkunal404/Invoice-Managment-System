<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailSetting extends Model
{

    protected $table = 'email_configurations';
    protected $fillable = [
        'mailer','host','port','username',
        'password','encryption',
        'from_name','from_email','is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
