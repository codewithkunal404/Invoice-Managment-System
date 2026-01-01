<?php

namespace App\Http\Controllers;

use App\Helpers\ActivityHelper;
use App\Helpers\ErrorHelper;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->get('search');


        $query = Customer::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhereHas('address', function ($q2) use ($search) {
                        $q2->where('city', 'like', "%{$search}%")
                            ->orWhere('state', 'like', "%{$search}%")
                            ->orWhere('postal_code', 'like', "%{$search}%");
                    });
            });
        }
        $customers = $query->latest()->paginate(10);
        return view('customer.index', compact('customers', 'search'));
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:customer,email',
                'phone_code' => 'required|string|max:10',
                'phone' => [
                    'required',
                    'string',
                    'regex:/^\+\d{1,4}(\s\d{6,20}|\d{6,20})$/',
                    'phone:' . $request->phone_code,
                ],
                'address' => 'required|string|max:500',
                'city' => 'required|string|max:100',
                'state' => 'required|string|max:100',
                'zip' => 'required|string|max:20',
                'country' => 'required|string|max:100',
                'active' => 'required|boolean',
            ],[
                'phone.required' => 'Phone number is required.',
                'phone.regex' => 'Use format +91 phone or +919876543210',
                'phone.phone' => 'Invalid phone number for selected country.',
            ]
        );

        DB::beginTransaction();

        try {

            // 1️⃣ Create Customer
            $customer = Customer::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'active' => $request->active ?? 1,
            ]);

            // 2️⃣ Create Address
            $customer->address()->create([
                'customer_id' => $customer->id,
                'address_line1' => $request->address,
                'address_line2' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'postal_code' => $request->zip,
                'country' => $request->country,
            ]);

            DB::commit();

            // ✅ Log activity AFTER successful commit
            ActivityHelper::log(
                'CREATE',
                'CUSTOMER',
                $customer->id,
                'Customer created successfully'
            );

            return redirect()
                ->route('customers.index')
                ->with('success', 'Customer created successfully');

        } catch (\Exception $e) {

            DB::rollBack();

            // ❌ Log error
            ErrorHelper::log('CUSTOMER_CREATE', $e);

            return back()
                ->withInput()
                ->withErrors([
                    'error' => 'An error occurred while saving the customer. Please try again.'
                ]);
        }
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);

        try {
            $customer->delete();

            // Log activity
            ActivityHelper::log(
                'DELETE',
                'CUSTOMER',
                $id,
                'Customer deleted successfully'
            );

            return redirect()
                ->route('customers.index')
                ->with('success', 'Customer deleted successfully');

        } catch (\Exception $e) {

            // Log error
            ErrorHelper::log('CUSTOMER_DELETE', $e);

            return back()
                ->withErrors([
                    'error' => 'An error occurred while deleting the customer. Please try again.'
                ]);
        }
    }

    public function edit($id)
    {
        $customer = Customer::with('address')->findOrFail($id);
        return view('customer.edit', compact('customer'));

    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:customer,email,' . $id,
                'phone_code' => 'required|string|max:10',
                'phone' => [
                    'required',
                    'string',
                    'regex:/^\+\d{1,4}(\s\d{6,20}|\d{6,20})$/',
                    'phone:' . $request->phone_code,
                ],
                'address' => 'required|string|max:500',
                'city' => 'required|string|max:100',
                'state' => 'required|string|max:100',
                'zip' => 'required|string|max:20',
                'country' => 'required|string|max:100',
                'active' => 'required|boolean',
            ],
            [
                'phone.required' => 'Phone number is required.',
                'phone.regex' => 'Use format +91 phone or +919876543210',
                'phone.phone' => 'Invalid phone number for selected country.',
            ]
        );
        DB::beginTransaction();
        try {
            $customer = Customer::findOrFail($id);
            $customer->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'phone_code' => $request->phone_code,
                'active' => $request->active ?? 1,
            ]);

            $customer->address()->update([
                'address_line1' => $request->address,
                'address_line2' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'postal_code' => $request->zip,
                'country' => $request->country,
            ]);

            DB::commit();

            ActivityHelper::log(
                'UPDATE',
                'CUSTOMER',
                $customer->id,
                'Customer updated successfully'
            );

            return redirect()
                ->route('customers.index')
                ->with('success', 'Customer updated successfully');

        } catch (\Exception $e) {

            DB::rollBack();

            ErrorHelper::log('CUSTOMER_UPDATE', $e);

            return back()
                ->withInput()
                ->withErrors([
                    'error' => 'An error occurred while updating the customer. Please try again.'
                ]);
        }



    }
}