<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanySetting;
use Illuminate\Support\Facades\Storage;

class CompanySettingController extends Controller
{
    public function edit()
    {
        $config = CompanySetting::first();
        return view('company.edit', compact('config'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'logo'    => 'nullable|image|max:2048|accepted_formats:jpeg,jpg',
            'address' => 'nullable|string',
            'state'   => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'phone'   => 'nullable|string|max:50',
            'email'   => 'nullable|email|max:255',
        ]);

        $config = CompanySetting::first() ?? new CompanySetting();

        if ($request->hasFile('logo')) {
            if ($config->logo) {
                Storage::disk('public')->delete($config->logo);
            }
            $config->logo = $request->file('logo')->store('company', 'public');
        }

        $config->fill($request->except('logo'));
        $config->save();

        return redirect()->back()->with('success', 'Company details saved successfully.');
    }
}
