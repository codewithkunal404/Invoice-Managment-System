@extends('layout.app')

@section('content')

<div class="container">
    <h2 class="mb-4">Error Logs</h2>

    <x:search :route="route('logs.errors')" :query="request()->get('search')" placeholder="Search error logs..." />
    <div class="card shadow border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Context</th>
                            <th>Message</th>
                            <th>Trace</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($logs as $log)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $log->context }}</td>
                                <td>{{ $log->message }}</td>
                                <td>
                                    <pre style="max-height:100px; overflow:auto;">{{ $log->trace }}</pre>
                                </td>
                                <td>{{ $log->created_at->format('d M Y, H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">No error logs found.</td>
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
