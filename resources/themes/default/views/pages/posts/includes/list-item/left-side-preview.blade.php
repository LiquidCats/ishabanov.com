@php
    /** @var App\Data\Database\Eloquent\Models\PostModel $post */
    /** @var App\Data\Database\Eloquent\Models\TagModel $tag */
@endphp

<article class="rounded-xl bg-night overflow-hidden group relative">
    <a href="{{ route('pages.blog.post', ['post_id' => $post->getKey()]) }}" class="absolute -inset-1"></a>
    <div class="grid grid-cols-1 grid-rows-2 md:grid-cols-3 md:grid-rows-1 gap-3 md:gap-0">
        <div class="col-12 col-md-4 bg-cover bg-no-repeat bg-center"
             style="background-image: url('{{ $post?->previewImage?->getFileUrl() }}');">
        </div>
        <div class="md:col-span-2 p-3">
            <div class="mb-3">
                <h2 class="text-5xl font-serif font-bold text-gray-50">{{ $post->title }}</h2>
                <small class="block text-gray-300">{{ $post->published_at->diffForHumans() }} | reading time {{ $post->reading_time }} min</small>
            </div>

            <div class="mb-3 flex flex-wrap gap-1">
                @foreach($post->tags as $tag)
                    <x-tag>{{ $tag->name }}</x-tag>
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
        </div>
    </div>
</article>
