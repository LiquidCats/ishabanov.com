<div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('pages.home') }}">iShabanov</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#default-navbar" aria-controls="default-navbar" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="default-navbar">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              @foreach($links as $link)
                  <li class="nav-item">
                      <a class="nav-link {{ $link['is_active'] ? 'active' : '' }}" aria-current="page" href="{{ $link['link'] }}">{{ $link['name'] }}</a>
                  </li>
              @endforeach
          </ul>
        </div>
      </div>
    </nav>
</div>
