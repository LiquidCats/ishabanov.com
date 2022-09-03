<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

@production
    @vite
@endproduction

@env('local')
    @client
    @tag('scripts')
    @tag('styles')
@endenv

@env('testing')
    @client
    @tag('scripts')
    @tag('styles')
@endenv

