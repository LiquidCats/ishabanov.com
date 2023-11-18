@php
    /** @var App\Data\Database\Eloquent\Models\PostModel $post */
    /** @var App\Data\Database\Eloquent\Models\TagModel $tag */
@endphp

<div class="col-12">
    <article class="posts__item bg-fill px-4 pb-4 rounded-4 overflow-hidden position-relative" style="background-image: url('{{ asset('storage/' . $post?->previewImage?->path) }}');">
        <a href="{{ route('pages.blog.post', ['post_id' => $post->getKey()]) }}"
           class="text-decoration-none d-block text-black position-relative z-1">
            <div class="posts__item__preview mb-3">
                <h2 class="mb-0 text-white">{{ $post->title }}</h2>
                <small class="text-white-50">{{ $post->published_at->diffForHumans() }} | reading time {{ $post->reading_time }} min</small>
            </div>

            <div class="posts__item__tags mb-3">
                @foreach($post->tags as $tag)
                    <x-tag :tag="$tag"/>
                @endforeach
            </div>
            <div class="posts__item__content  text-white">
                {!! $post->preview !!}
            </div>
            <div class="text-center">
                <div class="read-more btn d-inline-flex flex-column">
                    <div class="read-more__dots d-flex flex-row gap-2 px-4 align-items-center justify-content-center">
                        <span class="read-more__dot">&nbsp;</span>
                        <span class="read-more__dot">&nbsp;</span>
                        <span class="read-more__dot">&nbsp;</span>
                    </div>
                </div>
            </div>
        </a>
    </article>
</div>
