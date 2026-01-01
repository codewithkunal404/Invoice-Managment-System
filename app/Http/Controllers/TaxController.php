<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    public function index()
    {
        $taxes = Tax::orderBy('name')->get();
        return view('settings.taxes', compact('taxes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:100',
            'rate' => 'required|numeric|min:0',
            'type'  => 'required|in:percent,fixed',
        ]);

        Tax::create($request->only('name', 'rate', 'type'));
        return back()->with('success', 'Tax added successfully');
    }

    public function update(Request $request, Tax $tax)
    {
        $request->validate([
            'name'  => 'required|string|max:100',
            'rate' => 'required|numeric|min:0',
            'type'  => 'required|in:percent,fixed',
        ]);

        $tax->update($request->only('name', 'rate', 'type'));
        return back()->with('success', 'Tax updated successfully');
    }

    public function toggle(Tax $tax)
    {
        $tax->update(['active' => !$tax->active]);
        return back();
    }
}