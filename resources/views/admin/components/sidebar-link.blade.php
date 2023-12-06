@php use Illuminate\View\ComponentAttributeBag; @endphp
@props(['type' => 'primary', 'link'])

<li class="sidebar-link nav-item">
    <a {{ $attributes->class(['nav-link'])->merge(['class' => 'link-'. $type]) }}
       aria-current="page"
       {{ $attributes->when($attributes->has('backend-driven'), fn (ComponentAttributeBag $a) => $a->merge(['data-backend-driven']) ) }}
       href="{{ $link }}">
        @if($attributes->has('icon'))<i class="bi bi-{{ $attributes->get('icon') }}"></i>@endif {{ $slot }}
    </a>
</li>
