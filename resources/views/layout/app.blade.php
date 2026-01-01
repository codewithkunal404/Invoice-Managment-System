<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mini Invoice System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body { background: #f5f7fb }

        /* Global Search */
        .global-search-wrap {
            position: relative;
            width: 360px;
        }

        .global-search-wrap input {
            transition: all .3s ease;
        }

        .global-search-wrap input:focus {
            box-shadow: 0 0 0 .15rem rgba(13,110,253,.25);
        }

        #search-results {
            position: absolute;
            top: 105%;
            width: 100%;
            max-height: 360px;
            overflow-y: auto;
            border-radius: .5rem;
            z-index: 1050;
        }

        #search-results a {
            padding: .65rem .75rem;
            border: none;
            border-bottom: 1px solid #f1f1f1;
        }

        #search-results a:hover {
            background: #f5f7fb;
        }

        .search-module {
            font-size: 12px;
            font-weight: 600;
            color: #0d6efd;
            text-transform: uppercase;
        }

        .search-text {
            font-size: 13px;
            color: #6c757d;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">

        <a class="navbar-brand fw-bold" href="{{ route('home') }}">
            <i class="bi bi-receipt"></i> Invoice System
        </a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto align-items-center gap-3">

                <!-- GLOBAL SEARCH -->
                <li class="nav-item">
                    <div class="global-search-wrap">
                        <div class="input-group input-group-sm">
                            <select id="search-type" class="form-select">
                                <option value="all">All</option>
                                @foreach(config('searchable') as $key => $v)
                                    <option value="{{ $key }}">{{ ucfirst($key) }}</option>
                                @endforeach
                            </select>

                            <input
                                id="global-search"
                                type="text"
                                class="form-control"
                                placeholder="Search invoices, customers..."
                            >
                        </div>

                        <div id="search-results" class="list-group shadow-sm bg-white"></div>
                    </div>
                </li>

                <!-- NAV MENUS -->
                @include('partials.nav-menus')

            </ul>
        </div>
    </div>
</nav>

<!-- CONTENT -->
<main class="container py-4">
    @yield('content')
</main>

<!-- FOOTER -->
<footer class="bg-white border-top py-3 text-center">
    <small class="text-muted">
        © {{ date('Y') }} Mini Invoice System
    </small>
</footer>

<!-- Toast Container --> <div class="toast-container position-fixed top-0 end-0 p-3"> @if(session('success')) <div class="toast align-items-center text-bg-success border-0 show" role="alert"> <div class="d-flex"> <div class="toast-body">✅ {{ session('success') }}</div> <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button> </div> </div> @endif @if($errors->any()) <div class="toast align-items-center text-bg-danger border-0 show" role="alert"> <div class="d-flex"> <div class="toast-body">❌ {{ $errors->first() }}</div> <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button> </div> </div> @endif </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
const searchInput  = document.getElementById('global-search');
const moduleSelect = document.getElementById('search-type');
const resultsDiv   = document.getElementById('search-results');

let debounce = null;

searchInput.addEventListener('input', () => {
    clearTimeout(debounce);

    debounce = setTimeout(() => {
        const q = searchInput.value.trim();
        let module = moduleSelect.value === 'all' ? '' : moduleSelect.value;

        if (!q) {
            resultsDiv.innerHTML = '';
            return;
        }

        fetch(`/global-search?q=${encodeURIComponent(q)}&module=${module}`)
            .then(res => res.json())
            .then(data => {
                resultsDiv.innerHTML = '';

                if (!data.length) {
                    resultsDiv.innerHTML =
                        `<div class="list-group-item text-muted small">
                            No results found
                        </div>`;
                    return;
                }

                data.forEach(item => {
                    const el = document.createElement('a');
                    el.href = item.link;
                    el.className = 'list-group-item list-group-item-action';

                    el.innerHTML = `
                        <div class="search-module">${item.module}</div>
                        <div class="search-text">${item.text}</div>
                    `;

                    resultsDiv.appendChild(el);
                });
            })
            .catch(() => {
                resultsDiv.innerHTML =
                    `<div class="list-group-item text-danger small">
                        Search error
                    </div>`;
            });

    }, 300);
});
</script>

</body>
</html>
