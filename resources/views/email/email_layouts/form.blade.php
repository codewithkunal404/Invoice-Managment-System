@extends('layout.app')

@section('content')
    <div class="container">
        <h3>Email Header & Footer</h3>

        <form method="POST"
            action="{{ isset($layout) ? route('email-layouts.update', $layout->id) : route('email-layouts.store') }}">
            @csrf
            @isset($layout) @method('PUT') @endisset

            <div class="mb-3">
                <label>Layout Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $layout->name ?? '') }}">
            </div>

            <div class="mb-3">
                <label>Header HTML</label>
                <textarea name="header_html" class="form-control"
                    rows="6">{{ old('header_html', $layout->header_html ?? '') }}</textarea>
            </div>

            <div class="mb-3">
                <label>Footer HTML</label>
                <textarea name="footer_html" class="form-control"
                    rows="6">{{ old('footer_html', $layout->footer_html ?? '') }}</textarea>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1" @checked(old('is_active', $layout->is_active ?? false))>
                <label class="form-check-label" for="is_active">Active</label>
            </div>
            <button class="btn btn-primary">Save Layout</button>
        </form>
    </div>
@endsection