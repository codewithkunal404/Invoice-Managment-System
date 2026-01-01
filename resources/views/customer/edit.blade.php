@extends('layout.app')

@section('content')

<style>
    .page-title {
        font-weight: 600;
    }
    .card-header {
        background: linear-gradient(135deg, #1e3c72, #2a5298);
        color: #fff;
    }
    .form-label {
        font-weight: 500;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <h2 class="page-title mb-4">Edit Customer</h2>

            <div class="card shadow border-0">
                <div class="card-header">
                    Customer Information
                </div>

                <div class="card-body">

                    <form method="POST" action="{{ route('customers.update', $customer->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- BASIC INFO -->
                        <h5 class="mb-3 text-primary">Basic Details</h5>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control"
                                       value="{{ old('name', $customer->name) }}"
                                       placeholder="John Doe">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control"
                                       value="{{ old('email', $customer->email) }}"
                                       placeholder="john@example.com">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Phone Number</label>
                                <input type="text" name="phone" class="form-control"
                                       value="{{ old('phone', $customer->phone) }}"
                                       placeholder="+91 98765 43210">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Status</label>
                                <select name="active" class="form-control">
                                    <option value="1"
                                        {{ old('active', $customer->active) === 1 ? 'selected' : '' }}>
                                        Active
                                    </option>
                                    <option value="0"
                                        {{ old('active', $customer->active) === 0 ? 'selected' : '' }}>
                                        Inactive
                                    </option>
                                </select>
                            </div>
                        </div>

                        <hr>

                        <!-- ADDRESS INFO -->
                        <h5 class="mb-3 text-primary">Billing Address</h5>

                        <div class="mb-3">
                            <label class="form-label">Street Address</label>
                            <textarea name="address" class="form-control" rows="2"
                                      placeholder="123 Main Street, Apartment 4B">{{ old('address_line1', $customer->address->address_line1 ?? '') }}</textarea>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label">City</label>
                                <input type="text" name="city" class="form-control"
                                       value="{{ old('city', $customer->address->city ?? '') }}"
                                       placeholder="New Delhi">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">State</label>
                                <input type="text" name="state" class="form-control"
                                       value="{{ old('state', $customer->address->state ?? '') }}"
                                       placeholder="Delhi">
                            </div>

                             <div class="col-md-4">
                                <label class="form-label">Country</label>
                                <input type="text" name="country" class="form-control"
                                       value="{{ old('country', $customer->address->country ?? '') }}"
                                       placeholder="India..">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">ZIP / Postal Code</label>
                                <input type="text" name="zip" class="form-control"
                                       value="{{ old('zip', $customer->address->postal_code ?? '') }}"
                                       placeholder="110001">
                            </div>
                        </div>

                        <div class="text-end mt-4">
                            <a href="{{ route('customers.index') }}"
                               class="btn btn-outline-secondary me-2">
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-primary px-4">
                                Update Customer
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection
