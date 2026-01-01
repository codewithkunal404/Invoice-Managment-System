<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mini Invoice System</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            Invoice System
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                <!-- Customers -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="customersMenu"
                       role="button" data-bs-toggle="dropdown">
                        Customers
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="customersMenu">
                        <li><a class="dropdown-item" href="{{ route('customers.index') }}">Customer List</a></li>
                        <li><a class="dropdown-item" href="{{ route('customers.create') }}">Add Customer</a></li>
                    </ul>
                </li>

                <!-- Items -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="itemsMenu"
                       role="button" data-bs-toggle="dropdown">
                        Items
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="itemsMenu">
                        <li><a class="dropdown-item" href="{{ route('items.index') }}">Items List</a></li>
                        <li><a class="dropdown-item" href="{{ route('items.create') }}">Add Item</a></li>
                    </ul>
                </li>

                <!-- Invoices -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="invoicesMenu"
                       role="button" data-bs-toggle="dropdown">
                        Invoices
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="invoicesMenu">
                        <li><a class="dropdown-item" href="{{ route('invoices.index') }}">Invoice List</a></li>
                        <li><a class="dropdown-item" href="{{ route('invoices.create') }}">Add Invoice</a></li>
                    </ul>
                </li>

                <!-- Taxes -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="taxMenu"
                       role="button" data-bs-toggle="dropdown">
                        Taxes
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="taxMenu">
                        <li><a class="dropdown-item" href="{{ route('taxes.index') }}">Tax List</a></li>
                        {{-- <li><a class="dropdown-item" href="{{ route('taxes.create') }}">Add Tax</a></li> --}}
                    </ul>
                </li>

                <!-- Transactions -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="transactionsMenu"
                       role="button" data-bs-toggle="dropdown">
                        Transactions
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="transactionsMenu">
                        <li><a class="dropdown-item" href="{{ route('transactions.index') }}">Transaction Details</a></li>
                    </ul>
                </li>

                <!-- Activity Logs -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="logsMenu"
                       role="button" data-bs-toggle="dropdown">
                        Activity Logs
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="logsMenu">
                        <li><a class="dropdown-item" href="{{ route('logs.errors') }}">View Error Logs</a></li>
                        <li><a class="dropdown-item" href="{{ route('logs.activity') }}">View Activity Logs</a></li>
                    </ul>
                </li>

                <!-- Configurations -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="configMenu"
                       role="button" data-bs-toggle="dropdown">
                        Configurations
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="configMenu">
                        <li><a class="dropdown-item" href="{{ route('square.config.index') }}">Square</a></li>
                        <li><a class="dropdown-item" href="{{ route('company.edit') }}">Company</a></li>
                        <li><a class="dropdown-item" href="{{ route('email.edit') }}">Email</a></li>
                        <li><a class="dropdown-item" href="{{ route('email-templates.index') }}">EmailTemplate</a></li>
                        <li><a class="dropdown-item" href="{{ route('email-layouts.index') }}">EmailLayout</a></li>
                        <li><a class="dropdown-item" href="{{ route('email.tinymce.edit') }}">TinyMCE</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>

<main class="py-4">
    @yield('content')
</main>

<footer class="bg-light text-center py-3 mt-4">
    <small>© {{ date('Y') }} Mini Invoice System | Powered by Laravel + Square</small>
</footer>


<!-- TOAST CONTAINER -->
<div class="toast-container position-fixed top-0 end-0 p-3">

    {{-- Success Toast --}}
    @if(session('success'))
        <div class="toast align-items-center text-bg-success border-0 show" role="alert">
            <div class="d-flex">
                <div class="toast-body">
                    ✅ {{ session('success') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto"
                        data-bs-dismiss="toast"></button>
            </div>
        </div>
    @endif

    {{-- Error Toast --}}
    @if($errors->any())
        <div class="toast align-items-center text-bg-danger border-0 show" role="alert">
            <div class="d-flex">
                <div class="toast-body">
                    ❌ {{ $errors->first() }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto"
                        data-bs-dismiss="toast"></button>
            </div>
        </div>
    @endif

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.querySelectorAll('.toast').forEach(toastEl => {
        new bootstrap.Toast(toastEl, {
            delay: 4000
        }).show();
    });
</script>

</body>
</html>
