@php
    /** @var App\Data\Database\Eloquent\Models\PostModel $post */
    /** @var App\Data\Database\Eloquent\Models\TagModel $tag */
@endphp

<article class="rounded-xl bg-no-repeat bg-center bg-cover overflow-hidden group"
         style="background-image: url('{{ $post?->previewImage?->getFileUrl() }}');">
    <a href="{{ route('pages.blog.post', ['post_id' => $post->getKey()]) }}"
       class="block bg-gradient-to-t from-night to-night/[.5] backdrop-blur-sm hover:backdrop-blur-[1px] duration-300 px-3 md:px-6 lg:px-12 py-3">
        <div class="mb-3 h-96 flex flex-col justify-end">
            <h2 class="text-5xl text-gray-50 font-serif font-bold">{{ $post->title }}</h2>
            <small class="block text-gray-300">{{ $post->published_at->diffForHumans() }} | reading time {{ $post->reading_time }} min</small>
        </div>

        <div class="mb-3 flex flex-wrap gap-1">
            @foreach($post->tags as $tag)
                <x-tag type="light">{{ $tag->name }}</x-tag>
            @endforeach
        </div>
        <div class="mb-3 text-gray-50">{!! $post->preview !!}</div>
        <div class="text-center">
            <div class="bg-gray-200 inline-flex flex-row rounded-full group-hover:gap-4 duration-300 gap-2 items-center justify-center px-6 py-2">
                <div class="bg-stone-400 rounded-full size-2"></div>
                <div class="bg-stone-400 rounded-full size-2"></div>
                <div class="bg-stone-400 rounded-full size-2"></div>
            </div>
        </div>
    </a>
</article>
