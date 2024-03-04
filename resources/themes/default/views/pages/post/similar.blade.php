@php /** @var App\Data\Database\Eloquent\Models\PostModel $similarPost */ @endphp

@if($similar->isNotEmpty())
    <h4 class="text-gray-50 text-2xl mt-3">Similar</h4>
    <div class="grid md:grid-cols-3 gap-3">
    @foreach($similar as $similarPost)
        <article class="bg-night rounded-xl p-3">
            <a href="{{ route('pages.blog.post', ['post_id' => $similarPost->getKey()]) }}"
               class="block text-gray-50 no-underline">
                <h3 class="mb-0 text-xl">{{ $similarPost->title }}</h3>
                <small class="mb-3">{{ $similarPost->published_at->diffForHumans() }}</small>
                <div class="line-clamp-3">{{ strip_tags($similarPost->preview) }}</div>
            </a>
        </article>
    @endforeach
    </div>

@endif

