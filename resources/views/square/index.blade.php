@extends('layout.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Square Configuration</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('square.config.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Access Token</label>
            <input type="text" name="access_token" class="form-control"
                   value="{{ old('access_token', $config['access_token'] ?? '') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Environment</label>
            <select name="environment" class="form-control">
                <option value="sandbox" {{ (old('environment', $config['environment'] ?? '')=='sandbox') ? 'selected' : '' }}>Sandbox</option>
                <option value="production" {{ (old('environment', $config['environment'] ?? '')=='production') ? 'selected' : '' }}>Production</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Location ID</label>
            <input type="text" name="location_id" class="form-control"
                   value="{{ old('location_id', $config['location_id'] ?? '') }}">
        </div>

        <button type="submit" class="btn btn-primary">Save Configuration</button>
    </form>
</div>
@endsection
