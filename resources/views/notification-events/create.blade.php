@extends('layout.app')

@section('content')
<div class="container">
    <h3>Create Notification Event</h3>

    <form method="POST" action="{{ route('notification-events.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Key</label>
            <input type="text" name="key" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <button class="btn btn-primary">Save</button>
        <a href="{{ route('notification-events.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
