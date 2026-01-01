<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
    protected $fillable = [
        'name','subject','body_html',
        'variables','email_layout_id','is_active'
    ];

    protected $casts = [
        'variables' => 'array',
        'is_active' => 'boolean'
    ];

    public function layout()
    {
        return $this->belongsTo(EmailLayout::class, 'email_layout_id', 'id');
    }
}
