@php
    /** @var App\Data\Database\Eloquent\Models\PostModel $post */
    /** @var App\Data\Database\Eloquent\Models\TagModel $tag */
@endphp

<article class="rounded-xl bg-no-repeat bg-center bg-cover overflow-hidden"
         style="background-image: url('{{ $post?->previewImage?->getFileUrl() }}');">
    <a href="{{ route('pages.blog.post', ['post_id' => $post->getKey()]) }}"
       class="no-underline block bg-gradient-to-t from-night from-20% to-transparent p-3 backdrop-blur-sm hover:backdrop-blur-[1px] duration-300 text-gray-50">
        <div class="mb-3 h-96 flex flex-col justify-end">
            <h2 class="text-3xl">{{ $post->title }}</h2>
            <small class="text-white-50">{{ $post->published_at->diffForHumans() }} | reading time {{ $post->reading_time }} min</small>
        </div>

        <div class="mb-3 flex flex-wrap gap-1">
            @foreach($post->tags as $tag)
                <x-tag type="light">{{ $tag->name }}</x-tag>
            @endforeach
        </div>
        <div class="mb-3 text-gray-50">{!! $post->preview !!}</div>
        <div class="text-center">
            <div class="bg-gray-200 inline-flex flex-row rounded-full gap-2 items-center justify-center px-4 py-1">
                <div class="bg-stone-400 rounded-full size-2"></div>
                <div class="bg-stone-400 rounded-full size-2"></div>
                <div class="bg-stone-400 rounded-full size-2"></div>
            </div>
        </div>
    </a>
</article>
