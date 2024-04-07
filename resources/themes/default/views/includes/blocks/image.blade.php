@php
    /** @var object{src: string, alt: string,  caption: string|null} $content */
@endphp

<figure class="my-3">
    <img src="{{ $content->src }}" alt="{{ $content->alt }}" @class(['rounded-md', 'mx-auto', 'w-full', 'h-auto'])>
    @if($content->caption)
        <figcaption @class(['text-gray-500', 'max-w-screen-lg', 'text-center', 'mx-auto mt-2', 'leading-tight', ...$styles->map?->toStyle()])>
            {{ $content->caption }}
        </figcaption>
    @endif
</figure>
