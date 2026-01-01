<!-- Customers -->
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
        Customers
    </a>
    <ul class="dropdown-menu">
        <li>
            <a class="dropdown-item" href="{{ route('customers.index') }}">
                <i class="bi bi-people me-1"></i> Customer List
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="{{ route('customers.create') }}">
                <i class="bi bi-person-plus me-1"></i> Add Customer
            </a>
        </li>
    </ul>
</li>

<!-- Items -->
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
        Items
    </a>
    <ul class="dropdown-menu">
        <li>
            <a class="dropdown-item" href="{{ route('items.index') }}">
                <i class="bi bi-box me-1"></i> Item List
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="{{ route('items.create') }}">
                <i class="bi bi-plus-circle me-1"></i> Add Item
            </a>
        </li>
    </ul>
</li>

<!-- Invoices -->
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
        Invoices
    </a>
    <ul class="dropdown-menu">
        <li>
            <a class="dropdown-item" href="{{ route('invoices.index') }}">
                <i class="bi bi-receipt me-1"></i> Invoice List
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="{{ route('invoices.create') }}">
                <i class="bi bi-file-earmark-plus me-1"></i> Add Invoice
            </a>
        </li>
    </ul>
</li>

<!-- Taxes -->
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
        Taxes
    </a>
    <ul class="dropdown-menu">
        <li>
            <a class="dropdown-item" href="{{ route('taxes.index') }}">
                <i class="bi bi-percent me-1"></i> Tax List
            </a>
        </li>
    </ul>
</li>

<!-- Transactions -->
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
        Transactions
    </a>
    <ul class="dropdown-menu">
        <li>
            <a class="dropdown-item" href="{{ route('transactions.index') }}">
                <i class="bi bi-credit-card me-1"></i> Transaction Details
            </a>
        </li>
    </ul>
</li>

<!-- Activity Logs -->
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
        Logs
    </a>
    <ul class="dropdown-menu">
        <li>
            <a class="dropdown-item" href="{{ route('logs.activity') }}">
                <i class="bi bi-clock-history me-1"></i> Activity Logs
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="{{ route('logs.errors') }}">
                <i class="bi bi-exclamation-triangle me-1"></i> Error Logs
            </a>
        </li>
    </ul>
</li>

<!-- Configuration -->
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
        Configurations
    </a>
    <ul class="dropdown-menu">
        <li>
            <a class="dropdown-item" href="{{ route('company.edit') }}">
                <i class="bi bi-building me-1"></i> Company
            </a>
        </li>

        <li>
            <a class="dropdown-item" href="{{ route('square.config.index') }}">
                <i class="bi bi-credit-card-2-front me-1"></i> Square
            </a>
        </li>

        <li><hr class="dropdown-divider"></li>

        <li>
            <a class="dropdown-item" href="{{ route('email.edit') }}">
                <i class="bi bi-envelope me-1"></i> Email Settings
            </a>
        </li>

        <li>
            <a class="dropdown-item" href="{{ route('email-templates.index') }}">
                <i class="bi bi-file-text me-1"></i> Email Templates
            </a>
        </li>

        <li>
            <a class="dropdown-item" href="{{ route('email-layouts.index') }}">
                <i class="bi bi-layout-text-sidebar me-1"></i> Email Layouts
            </a>
        </li>

        <li>
            <a class="dropdown-item" href="{{ route('email.tinymce.edit') }}">
                <i class="bi bi-code-slash me-1"></i> TinyMCE
            </a>
        </li>

        <li><hr class="dropdown-divider"></li>

        <li>
            <a class="dropdown-item" href="{{ route('notification-events.index') }}">
                <i class="bi bi-bell me-1"></i> Events
            </a>
        </li>

        <li>
            <a class="dropdown-item" href="{{ route('notification-event-templates.index') }}">
                <i class="bi bi-lightning me-1"></i> Event Templates
            </a>
        </li>
    </ul>
</li>
