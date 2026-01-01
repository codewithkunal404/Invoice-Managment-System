@extends('layout.app')

@section('content')

<div class="container">
    <h2 class="mb-4">Activity Logs</h2>

    <x:search :route="route('logs.activity')" :query="request()->get('search')" placeholder="Search activity logs..." />

    <div class="card shadow border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>Module</th>
                            <th>Module ID</th>
                            <th>Message</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($logs as $log)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $log->type }}</td>
                                <td>{{ $log->module }}</td>
                                <td>{{ $log->record_id ?? '-' }}</td>
                                <td>{{ $log->description }}</td>
                                <td>{{ $log->created_at->format('d M Y, H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">No activity logs found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-3">
        {{ $logs->links('pagination::bootstrap-5') }}
    </div>
</div>

@endsection
