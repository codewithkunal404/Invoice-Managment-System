@extends('layout.app')

@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="page-title">Notification Events</h2>

        <a href="{{ route('notification-events.create') }}" class="btn btn-primary">
            + Create Event
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Key</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Created</th>
                            <th width="180">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($events as $event)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="fw-semibold">{{ $event->key }}</td>
                                <td>{{ $event->name }}</td>
                                <td class="text-muted">
                                    {{ Str::limit($event->description, 50) }}
                                </td>
                                <td>{{ $event->created_at->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('notification-events.edit', $event->id) }}"
                                       class="btn btn-sm btn-info">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <form action="{{ route('notification-events.destroy', $event->id) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">
                                    No notification events found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-3">
        {{ $events->links('pagination::bootstrap-5') }}
    </div>
</div>

@endsection
