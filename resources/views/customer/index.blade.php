@extends('layout.app')

@section('content')

<style>
    .page-title {
        font-weight: 600;
    }
    .table-actions button {
        margin-right: 5px;
    }
</style>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="page-title">Customers</h2>
        <a href="{{ route('customers.create') }}" class="btn btn-primary">
            + Add Customer
        </a>
    </div>  <!-- Reusable Search Component -->
    <x-search :route="route('customers.index')" :query="$search" placeholder="Search customers..." />


    <div class="card shadow border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>City</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($customers as $customer)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->phone ?? '-' }}</td>
                                <td>
                                    @if($customer->active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>{{ $customer->address->city ?? '-' }}</td>
                                <td class="table-actions">
                                    <a href="{{ route('customers.edit', $customer->id) }}"
                                       class="btn btn-sm btn-warning">
                                        Edit
                                    </a>
                                    <form action="{{ route('customers.destroy', $customer->id) }}"
                                          method="POST" class="d-inline-block"
                                          onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted">No customers found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-3">
        {{ $customers->links('pagination::bootstrap-5') }}
    </div>

</div>

@endsection
