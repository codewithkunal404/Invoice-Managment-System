<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailLayout extends Model
{
     protected $fillable = [
        'name','header_html','footer_html','is_active'
    ];
    
}
