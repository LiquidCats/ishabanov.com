<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

@production
    @vite
@endproduction

@env('local')
    <link rel="stylesheet" href="http://localhost:5173/resources/scss/styles.scss">
    <script type="module" src="http://localhost:5173/resources/js/scripts.js" defer></script>
@endenv

