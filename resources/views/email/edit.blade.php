@extends('layout.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Email Configuration (SMTP)</h2>

        <form method="POST" action="{{ route('email.update') }}">
            @csrf
            @method('PUT')

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">Mailer</label>
                    <select name="mailer" class="form-control" required>
                        <option value="">Select Mailer</option>
                        <option value="smtp" @selected(old('mailer', $config->mailer ?? '') == 'smtp')>SMTP</option>
                        <option value="ses" @selected(old('mailer', $config->mailer ?? '') == 'ses')>Amazon SES</option>
                        <option value="sendmail" @selected(old('mailer', $config->mailer ?? '') == 'sendmail')>Sendmail
                        </option>
                        <option value="log" @selected(old('mailer', $config->mailer ?? '') == 'log')>Log (Testing)</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">SMTP Host</label>
                    <input type="text" name="host" class="form-control" value="{{ old('host', $config->host ?? '') }}"
                        required>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Port</label>
                    <input type="number" name="port" class="form-control" value="{{ old('port', $config->port ?? '') }}"
                        required>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Encryption</label>
                    <select name="encryption" class="form-control">
                        <option value="">None</option>
                        <option value="tls" @selected(old('encryption', $config->encryption ?? '') == 'tls')>TLS</option>
                        <option value="ssl" @selected(old('encryption', $config->encryption ?? '') == 'ssl')>SSL</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">SMTP Username</label>
                <input type="text" name="username" class="form-control"
                    value="{{ old('username', $config->username ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">SMTP Password</label>

                <div class="input-group">
                    <input type="password" name="password" id="smtp-password" class="form-control"
                        value="{{ old('password', $config->password ?? '') }}" placeholder="{{ $config ? 'Leave blank to keep existing password' : '' }}">

                    <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">
                        <i id="password-eye" class="bi bi-eye"></i>
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">From Name</label>
                    <input type="text" name="from_name" class="form-control"
                        value="{{ old('from_name', $config->from_name ?? '') }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">From Email</label>
                    <input type="email" name="from_email" class="form-control"
                        value="{{ old('from_email', $config->from_email ?? '') }}" required>
                </div>
            </div>

            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" name="is_active" value="1" @checked(old('is_active', $config->is_active ?? false))>
                <label class="form-check-label">
                    Set as Active Email Configuration
                </label>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    Save Email Configuration
                </button>

                @if($config)
                    <a href="{{ route('email-configurations.test', $config->id) }}" class="btn btn-outline-success">
                        Test SMTP
                    </a>
                @endif
            </div>
        </form>
    </div>
@endsection
<script>
    function togglePassword() {
        const input = document.getElementById('smtp-password');
        const eye = document.getElementById('password-eye');

        if (input.type === 'password') {
            input.type = 'text';
            eye.classList.remove('bi-eye');
            eye.classList.add('bi-eye-slash');
        } else {
            input.type = 'password';
            eye.classList.remove('bi-eye-slash');
            eye.classList.add('bi-eye');
        }
    }
</script>