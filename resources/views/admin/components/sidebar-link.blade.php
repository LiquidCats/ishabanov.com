<li class="nav-item">
    <a @class(['nav-link', 'link-danger' => $sidebarType === 'danger']) aria-current="page" href="{{ $sidebarLink }}">
        <i class="bi bi-{{ $sidebarIcon }}"></i> {{ $sidebarName }}
    </a>
</li>
