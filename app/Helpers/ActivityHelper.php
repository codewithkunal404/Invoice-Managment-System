<?php

namespace App\Helpers;

use App\Models\ActivityLog;

class ActivityHelper
{
    public static function log($action, $module, $recordId = null, $description = null)
    {
        ActivityLog::create([
            'action'      => $action,
            'module'      => $module,
            'record_id'   => $recordId,
            'description' => $description,
            'ip_address'  => request()->ip(),
        ]);
    }
}
