@extends('layout.app')

@section('content')
    <div class="container">
        <h3>Email Layouts</h3>

        <a href="{{ route('email-layouts.create') }}" class="btn btn-primary mb-3">Add New Layout</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($layouts as $layout)
                    <tr>
                        <td>{{ $layout->name }}</td>
                        <td>
                            @if($layout->is_active)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('email-layouts.edit', $layout->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('email-layouts.destroy', $layout->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Delete this layout?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No layouts found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection