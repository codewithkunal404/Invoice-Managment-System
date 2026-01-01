@extends('layout.app')

@section('content')

<style>
    .page-title { font-weight: 600; }
    .card-header { background: linear-gradient(135deg, #1e3c72, #2a5298); color: #fff; }
    .form-label { font-weight: 500; }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h2 class="page-title mb-4">Add Item</h2>

            <div class="card shadow border-0">
                <div class="card-header">Item Information</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('items.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control"
                                   value="{{ old('name') }}" placeholder="Item name">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">SKU</label>
                            <input type="text" name="sku" class="form-control"
                                   value="{{ old('sku') }}" placeholder="Stock Keeping Unit">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="2"
                                      placeholder="Item description">{{ old('description') }}</textarea>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Price</label>
                                <input type="number" step="0.01" name="price" class="form-control"
                                       value="{{ old('price') }}" placeholder="0.00">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Quantity</label>
                                <input type="number" name="quantity" class="form-control"
                                       value="{{ old('quantity') }}" placeholder="0">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="active" class="form-control">
                                <option value="1" {{ old('active', 1) == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('active') == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                        <div class="text-end mt-4">
                            <a href="{{ route('items.index') }}" class="btn btn-outline-secondary me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary px-4">Save Item</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
