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
        #global-search { width: 220px; transition: .3s }
        #global-search:focus { width: 320px }

        #search-results {
            position: absolute;
            top: 100%;
            z-index: 1050;
            width: 420px;
            max-height: 350px;
            overflow-y: auto;
        }

        .search-module {
            background: #f8f9fa;
            font-weight: 600;
            font-size: 13px;
        }
    </style>
</head>

<body class="bg-light">

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">Invoice System</a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto align-items-center">

                <!-- GLOBAL SEARCH -->
                <li class="nav-item position-relative me-3">
                    <div class="input-group input-group-sm">
                        <select id="search-type" class="form-select">
                            <option value="all">All</option>
                            @foreach(config('searchable') as $key => $v)
                                <option value="{{ $key }}">{{ $key }}</option>
                            @endforeach
                        </select>
                        <input id="global-search" type="text" class="form-control" placeholder="Search...">
                    </div>
                    <div id="search-results" class="list-group shadow"></div>
                </li>

                <!-- MENUS (unchanged) -->
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
<footer class="bg-white text-center py-3 border-top">
    <small>© {{ date('Y') }} Mini Invoice System</small>
</footer>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
const searchInput  = document.getElementById('global-search');
const moduleSelect = document.getElementById('search-type'); // ✅ FIXED
const resultsDiv   = document.getElementById('search-results');

let timeout = null;

searchInput.addEventListener('input', () => {
    clearTimeout(timeout);

    timeout = setTimeout(() => {
        const q = searchInput.value.trim();
        let module = moduleSelect.value;

        // ✅ IMPORTANT FIX
        if (module === 'all') module = '';

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
                        `<div class="list-group-item text-muted">No results found</div>`;
                    return;
                }

                data.forEach(item => {
                    const el = document.createElement('a');
                    el.href = item.link;
                    el.className = 'list-group-item list-group-item-action';
                    el.innerHTML = `
                        <div class="fw-semibold">${item.module}</div>
                        <small class="text-muted">${item.text}</small>
                    `;
                    resultsDiv.appendChild(el);
                });
            })
            .catch(err => {
                console.error(err);
                resultsDiv.innerHTML =
                    `<div class="list-group-item text-danger">Search error</div>`;
            });

    }, 300);
});
</script>

</body>
</html>
