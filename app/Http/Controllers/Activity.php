<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\ErrorLog;
use Illuminate\Http\Request;

class Activity extends Controller
{
   public function activity(Request $request)
    {

        $search = $request->get('search');
        $query = ActivityLog::query();

        if ($search) {
            $query->where('description', 'like', "%{$search}%");
        }

        $logs = $query->latest()->paginate(15);
        return view('logs.activity', compact('logs'));
    }

    public function errors(Request $request )
    {

        $search = $request->get('search');
        $query = ErrorLog::query();

        if ($search) {
            $query->where('message', 'like', "%{$search}%");
        }

        $logs = $query->latest()->paginate(15);
        return view('logs.errors', compact('logs'));
    }
}
