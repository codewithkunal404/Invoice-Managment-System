@extends('layout.app')

@section('content')
<div class="container">
    <h3>Edit Notification Event</h3>

    <form method="POST" action="{{ route('notification-events.update', $notificationEvent->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Key</label>
            <input type="text" name="key" class="form-control"
                   value="{{ $notificationEvent->key }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control"
                   value="{{ $notificationEvent->name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ $notificationEvent->description }}</textarea>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('notification-events.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
