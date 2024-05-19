document.addEventListener('DOMContentLoaded', function() {
    const searchIcon = document.getElementById('search-icon');
    const searchInput = document.getElementById('search-input');
    const loaderOverlay = document.getElementById('loader-overlay');

    searchIcon.addEventListener('click', function() {
        searchInput.classList.toggle('d-none');
        searchInput.focus();
    });

    document.addEventListener('click', function(event) {
        if (!searchIcon.contains(event.target) && !searchInput.contains(event.target)) {
            searchInput.classList.add('d-none');
        }
    });

    searchInput.addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            loaderOverlay.classList.remove('d-none');

            // Redirigir a la home con la variable GET `search`
            const query = searchInput.value;
            window.location.href = '/?search=' + encodeURIComponent(query);
        }
    });
});