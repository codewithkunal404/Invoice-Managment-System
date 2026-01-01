@extends('layout.app')

@section('content')
    <div class="container">
        <h3>Email Templates</h3>

        <a href="{{ route('email-templates.create') }}" class="btn btn-primary mb-3">Add New Template</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Subject</th>
                    <th>Layout</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($templates as $template)
                    <tr>
                        <td>{{ $template->name }}</td>
                        <td>{{ $template->subject }}</td>
                        <td>{{ $template->layout?->name ?? 'None' }}</td>
                        <td>
                            @if($template->layout->is_active)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('email-templates.edit', $template->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('email-templates.destroy', $template->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Delete this template?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No templates found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection