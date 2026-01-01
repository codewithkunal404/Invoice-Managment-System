<?php
namespace App\Helpers;

use App\Models\ErrorLog;

class ErrorHelper
{
    public static function log($module, \Exception $e)
    {
        ErrorLog::create([
            'module'     => $module,
            'error_type' => get_class($e),
            'message'    => $e->getMessage(),
            'trace'      => $e->getTraceAsString(),
            'ip_address' => request()->ip(),
        ]);
    }
}
