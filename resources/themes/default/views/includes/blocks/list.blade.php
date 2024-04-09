@php
    use App\Domains\Blocks\Enums\ListTag;
    use Illuminate\Support\Collection;
    /** @var ListTag $tag */
    /** @var Collection $content */
@endphp

@if($tag === ListTag::UL)
    <ul>
        @foreach($content as $item)
            {{ $item->render() }}
        @endforeach
    </ul>
@endif
@if($tag === ListTag::OL)
    <ol>
        @foreach($content as $item)
            {{ $item->render() }}
        @endforeach
    </ol>
@endif
