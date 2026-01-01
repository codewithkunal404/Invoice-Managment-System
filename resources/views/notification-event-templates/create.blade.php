@extends('layout.app')

@section('content')
<div class="container">
    <h3>Create Mapping</h3>

    <form method="POST" action="{{ route('notification-event-templates.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Notification Event</label>
            <select name="notification_event_id" class="form-control" required>
                <option value="">Select Event</option>
                @foreach($events as $event)
                    <option value="{{ $event->id }}">{{ $event->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Email Template</label>
            <select name="email_template_id" class="form-control" required>
                <option value="">Select Template</option>
                @foreach($templates as $template)
                    <option value="{{ $template->id }}">{{ $template->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="is_active" checked>
            <label class="form-check-label">Active</label>
        </div>

        <button class="btn btn-primary">Save</button>
        <a href="{{ route('notification-event-templates.index') }}"
           class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
