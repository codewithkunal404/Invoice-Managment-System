@extends('layout.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h2>Notification Event Mapping</h2>

        <a href="{{ route('notification-event-templates.create') }}"
           class="btn btn-primary">
            + Add Mapping
        </a>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Event</th>
                    <th>Email Template</th>
                    <th>Status</th>
                    <th width="160">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($mappings as $map)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $map->event->name ?? '-' }}</td>
                        <td>{{ $map->template->name ?? '-' }}</td>
                        <td>
                            <span class="badge {{ $map->is_active ? 'bg-success' : 'bg-danger' }}">
                                {{ $map->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('notification-event-templates.edit', $map->id) }}"
                               class="btn btn-sm btn-info">Edit</a>

                            <form method="POST"
                                  action="{{ route('notification-event-templates.destroy', $map->id) }}"
                                  class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('Delete mapping?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">
                            No mappings found.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $mappings->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
