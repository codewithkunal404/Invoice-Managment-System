@props([
    'route' => '#',       // route to submit search
    'query' => '',        // current search value
    'placeholder' => 'Search...'
])

<form id="searchForm" method="GET" action="{{ $route }}" class="d-flex mb-3">
    <input type="text" id="searchInput" name="search" value="{{ old('search', $query) }}"
           class="form-control" placeholder="{{ $placeholder }}">
</form>

@push('scripts')
<script>
    // Debounce function to delay search requests
    function debounce(func, delay) {
        let timer;
        return function() {
            const context = this;
            const args = arguments;
            clearTimeout(timer);
            timer = setTimeout(() => func.apply(context, args), delay);
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('searchInput');
        const form = document.getElementById('searchForm');

        searchInput.addEventListener('input', debounce(function () {
            form.submit(); // submit form on key change after 500ms
        }, 500));
    });
</script>
@endpush
