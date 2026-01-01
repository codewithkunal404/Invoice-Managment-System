<?php

namespace App\Http\Controllers;

use App\Helpers\ActivityHelper;
use Illuminate\Http\Request;
use App\Helpers\SquareHelper;

class SquareConfigController extends Controller
{
    public function index()
    {
        $config = SquareHelper::get();
        return view('square.index', compact('config'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'access_token' => 'required|string',
            'environment' => 'required|in:sandbox,production',
            'location_id' => 'required|string',
        ]);

        SquareHelper::set($data);
        ActivityHelper::log(
                'CREATE',
                'SQUARE_CONFIG',
                null,
                'Square configuration created successfully'
        );

        return redirect()->back()->with('success', 'Square configuration saved successfully.');
    }
}
