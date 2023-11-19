<li class="nav-item">
    <a @class(['nav-link', 'link-danger' => $type === 'danger']) aria-current="page" href="{{ $link }}">
        <i class="bi bi-{{ $icon }}"></i> {{ $text }}
    </a>
</li>
