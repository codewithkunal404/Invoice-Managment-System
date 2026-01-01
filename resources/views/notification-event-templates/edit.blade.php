@extends('layout.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Edit Notification Event Mapping</h3>

        <a href="{{ route('notification-event-templates.index') }}"
           class="btn btn-secondary">
            ← Back
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form method="POST"
                  action="{{ route('notification-event-templates.update', $notificationEventTemplate->id) }}">
                @csrf
                @method('PUT')

                <!-- Notification Event -->
                <div class="mb-3">
                    <label class="form-label">Notification Event</label>
                    <select name="notification_event_id"
                            class="form-control @error('notification_event_id') is-invalid @enderror"
                            required>
                        <option value="">Select Event</option>
                        @foreach($events as $event)
                            <option value="{{ $event->id }}"
                                {{ old('notification_event_id', $notificationEventTemplate->notification_event_id) == $event->id ? 'selected' : '' }}>
                                {{ $event->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('notification_event_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email Template -->
                <div class="mb-3">
                    <label class="form-label">Email Template</label>
                    <select name="email_template_id"
                            class="form-control @error('email_template_id') is-invalid @enderror"
                            required>
                        <option value="">Select Template</option>
                        @foreach($templates as $template)
                            <option value="{{ $template->id }}"
                                {{ old('email_template_id', $notificationEventTemplate->email_template_id) == $template->id ? 'selected' : '' }}>
                                {{ $template->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('email_template_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Status -->
                <div class="form-check mb-4">
                    <input class="form-check-input"
                           type="checkbox"
                           name="is_active"
                           id="is_active"
                           {{ old('is_active', $notificationEventTemplate->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">
                        Active
                    </label>
                </div>

                <!-- Actions -->
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        Update Mapping
                    </button>

                    <a href="{{ route('notification-event-templates.index') }}"
                       class="btn btn-outline-secondary">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
