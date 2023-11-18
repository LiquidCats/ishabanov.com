<header class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-dark overflow-hidden bg-opacity-75 bg-primary" style="backdrop-filter: blur(10px)">
        <div class="container">
            <a class="navbar-brand shadow" href="/">
                <img src="{{ $logo }}" alt="logo" width="24" class="rounded-1">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#default-navbar" aria-controls="default-navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-grow-0" id="default-navbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @foreach($links as $link)
                    <li class="nav-item">
                        <a @class(['nav-link', 'active' => $link['is_active'] ?? false]) aria-current="page" href="{{ $link['link'] }}">{{ $link['text'] }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>
</header>


