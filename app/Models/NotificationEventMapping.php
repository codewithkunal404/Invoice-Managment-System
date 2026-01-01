<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotificationEventMapping extends Model
{
    protected $table="notification_event_templates";
    protected $fillable = [
        'notification_event_id',
        'email_template_id',
        'is_active',
    ];

    public function event()
    {
        return $this->belongsTo(NotificationEvent::class, 'notification_event_id');
    }
    public function template()
    {
        return $this->belongsTo(EmailTemplate::class, 'email_template_id');
    }
}
