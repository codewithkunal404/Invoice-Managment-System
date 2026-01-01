@extends('layout.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">TinyMCE</h2>
        <form method="POST" action="{{ route('email.tinymce.update') }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">API KEY</label>
                <input type="text" name="tinymce_api_key" class="form-control" value="{{ old('', $config->api_key ?? '') }}">
            </div>
            <button type="submit" class="btn btn-primary">Save Key</button>
        </form>
    </div>
@endsection
