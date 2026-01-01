@extends('layout.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Tax Settings</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- ADD TAX --}}
    <div class="card mb-4">
        <div class="card-header fw-bold">Add New Tax</div>
        <div class="card-body">
            <form method="POST" action="{{ route('taxes.store') }}">
                @csrf

                <div class="row">
                    <div class="col-md-4">
                        <label class="form-label">Tax Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Value</label>
                        <input type="number" step="0.01" name="rate" class="form-control" required>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Type</label>
                        <select name="type" class="form-control">
                            <option value="percent">Percent (%)</option>
                            <option value="fixed">Fixed Amount</option>
                        </select>
                    </div>

                    <div class="col-md-2 d-flex align-items-end">
                        <button class="btn btn-primary w-100">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- TAX LIST --}}
    <div class="card shadow border-0">
        <div class="card-header fw-bold">Tax List</div>
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Value</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th width="220">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($taxes as $tax)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <form method="POST" action="{{ route('taxes.update', $tax) }}">
                            @csrf
                            @method('PUT')

                            <td>
                                <input type="text" name="name"
                                       class="form-control form-control-sm"
                                       value="{{ $tax->name }}">
                            </td>

                            <td>
                                <input type="number" step="0.01" name="rate"
                                       class="form-control form-control-sm"
                                       value="{{ $tax->rate }}">
                            </td>

                            <td>
                                <select name="type" class="form-control form-control-sm">
                                    <option value="percent" {{ $tax->type=='percent'?'selected':'' }}>
                                        Percent
                                    </option>
                                    <option value="fixed" {{ $tax->type=='fixed'?'selected':'' }}>
                                        Fixed
                                    </option>
                                </select>
                            </td>

                            <td>
                                <span class="badge {{ $tax->active ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $tax->active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>

                            <td>
                                <button class="btn btn-sm btn-primary">
                                    <i class="bi bi-save"></i>
                                </button>

                                <a href="{{ route('taxes.toggle', parameters: $tax) }}"
                                   class="btn btn-sm btn-warning">
                                    <i class="bi bi-arrow-repeat"></i>
                                </a>
                            </td>
                        </form>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">
                            No taxes found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
