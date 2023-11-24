@props(['type' => 'primary', 'link'])

<li class="sidebar-link nav-item">
    <a {{ $attributes->class(['nav-link'])->merge(['class' => ' link-'. $type]) }}
       aria-current="page"
       href="{{ $link }}">
        <i class="bi bi-{{ $attributes->get('icon') }}"></i> {{ $slot }}
    </a>
</li>
