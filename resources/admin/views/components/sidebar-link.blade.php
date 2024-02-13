@php use Illuminate\View\ComponentAttributeBag; @endphp
@props(['type' => 'primary', 'link'])

<li>
    <a {{ $attributes->class([
        'nav-link',
        'flex',
        'gap-1',
        'items-center',
        'hover:bg-slate-50/[.1]',
        'px-5', 'py-1.5',
        'rounded-md',
        'duration-300',
    ]) }}
       aria-current="page"
       {{ $attributes->when($attributes->has('backend-driven'), fn (ComponentAttributeBag $a) => $a->merge(['data-backend-driven' => "true"]) ) }}
       href="{{ $link }}">
        @if($attributes->has('icon'))<i class="bi bi-{{ $attributes->get('icon') }}"></i>@endif {{ $slot }}
    </a>
</li>
