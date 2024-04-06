@php /** @var string $content */ @endphp
@php /** @var Illuminate\Support\Collection $styles */ @endphp

<pre class="my-3 rounded-md overflow-hidden p-0"><code @class(["rounded-md", ...$styles->map->toStyle()])>{{ $content }}</code></pre>


