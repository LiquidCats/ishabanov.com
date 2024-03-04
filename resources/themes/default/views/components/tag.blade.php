<span {{ $attributes->class([
    'inline-flex',
    'items-center',
    'justify-center',
    'bg-gray-100',
    'text-stone-800',
    'py-0.5',
    'px-1.5',
    'rounded-sm',
    'text-sm'
])->merge(['class' => $attributes->get('class')]) }}>
    <x-heroicon-o-hashtag class="size-4"/> {{ $slot }}
</span>
