@extends('layout.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Company Settings</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('company.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Company Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $config->name ?? '') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Logo</label>
                <input type="file" name="logo" class="form-control">
            @if(!empty($config->logo))
                <img src="{{ asset('storage/' . $config->logo) }}" alt="Logo" class="mt-2" style="max-height:80px;">
            @endif
            </div>

            <div class="mb-3">
                <label class="form-label">Address</label>
                <textarea name="address" class="form-control">{{ old('address', $config->address ?? '') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">State</label>
                <input type="text" name="state" class="form-control" value="{{ old('state', $config->state ?? '') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Country</label>
                <input type="text" name="country" class="form-control" value="{{ old('country', $config->country ?? '') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone', $config->phone ?? '') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $config->email ?? '') }}">
            </div>

            <button type="submit" class="btn btn-primary">Save Company Details</button>
        </form>
    </div>
@endsection
