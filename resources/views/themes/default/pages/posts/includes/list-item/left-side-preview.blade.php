@php
    /** @var App\Data\Database\Eloquent\Models\PostModel $post */
    /** @var App\Data\Database\Eloquent\Models\TagModel $tag */
@endphp

<div class="col-12">
    <article class="posts__item rounded-4 bg-white overflow-hidden">
        <a href="{{ route('pages.blog.post', ['post_id' => $post->getKey()]) }}" class="text-decoration-none d-block text-black">
            <div class="row ">
                <div class="posts__item__image col-12 col-md-4" style="background-image: url('{{ $post?->previewImage?->getFileUrl() }}');">
                    &nbsp;
                </div>
                <div class="col-12 col-md-8 p-4">
                    <div class="posts__item__preview mb-3">
                        <h2 class="mb-0">{{ $post->title }}</h2>
                        <small class="text-light-emphasis">{{ $post->published_at->diffForHumans() }} | reading time {{ $post->reading_time }} min</small>
                    </div>

                    <div class="posts__item__tags mb-3">
                        @foreach($post->tags as $tag)
                            <x-tag>{{ $tag->name }}</x-tag>
                        @endforeach
                    </div>
                    <div class="posts__item__content">
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
                </div>
            </div>
        </a>
    </article>
</div>
