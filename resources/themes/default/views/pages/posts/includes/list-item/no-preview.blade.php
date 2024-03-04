@php
    /** @var App\Data\Database\Eloquent\Models\PostModel $post */
    /** @var App\Data\Database\Eloquent\Models\TagModel $tag */
@endphp

<article class="p-3 rounded-xl bg-night">
    <a href="{{ route('pages.blog.post', ['post_id' => $post->getKey()]) }}"
       class="no-underline block text-gray-50">
        <div class="mb-3">
            <h2 class="text-3xl">{{ $post->title }}</h2>
            <small>{{ $post->published_at->diffForHumans() }} | reading time {{ $post->reading_time }} min</small>
        </div>

        <div class="mb-3 flex flex-wrap gap-1">
            @foreach($post->tags as $tag)
                <x-tag>{{ $tag->name }}</x-tag>
            @endforeach
        </div>
        <div class="mb-3">
            {!! $post->preview !!}
        </div>
        <div class="text-center">
            <div class="bg-gray-200 inline-flex flex-row rounded-full gap-2 items-center justify-center px-4 py-1">
                <div class="bg-stone-400 rounded-full size-2"></div>
                <div class="bg-stone-400 rounded-full size-2"></div>
                <div class="bg-stone-400 rounded-full size-2"></div>
            </div>
        </div>
    </a>
</article>


