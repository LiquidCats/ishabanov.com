@php use Illuminate\View\ComponentAttributeBag; @endphp
@props(['type' => 'primary', 'link'])

<li {{ $attributes->when($attributes->has('backend-driven'), fn (ComponentAttributeBag $a) => $a->merge(['data-backend-driven' => "true"]) ) }}>
    <a {{ $attributes->class([
        'flex',
        'gap-1',
        'justify-center', 'md:justify-start',
        'items-center',
        'py-1.5',
        'md:px-3',
        'rounded-md',
        'duration-300',
    ])->merge(['class' => $attributes->get('class')]) }}
       aria-current="page"
       href="{{ $link }}">
        @if($attributes->has('icon'))
            @svg('heroicon-o-'. $attributes->get('icon'), 'size-8 md:size-4')
        @endif
            <span class="hidden md:inline">{{ $slot }}</span>
    </a>
</li>
