@php
    use App\Domains\Blocks\Enums\HeadingTag;
    use Illuminate\Support\Collection;

    /** @var Collection $styles */
    /** @var HeadingTag $tag */
    /** @var string $content */
@endphp

@if($tag === HeadingTag::H1)
    <h1 @class($styles->map?->toStyle())>
        {!! $content !!}
    </h1>
@endif

@if($tag === HeadingTag::H2)
    <h2 @class($styles->map?->toStyle())>
        {!! $content !!}
    </h2>
@endif

@if($tag === HeadingTag::H3)
    <h3 @class($styles->map?->toStyle())>
        {!! $content !!}
    </h3>
@endif

@if($tag === HeadingTag::H4)
    <h4 @class($styles->map?->toStyle())>
        {!! $content !!}
    </h4>
@endif

@if($tag === HeadingTag::H5)
    <h5 @class($styles->map?->toStyle())>
        {!! $content !!}
    </h5>
@endif

@if($tag === HeadingTag::H6)
    <h6 @class($styles->map?->toStyle())>
        {!! $content !!}
    </h6>
@endif



