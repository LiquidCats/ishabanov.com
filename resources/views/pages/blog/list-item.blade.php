@php
    /** @var App\Data\Database\Eloquent\Models\Post $post */
    /** @var App\Data\Database\Eloquent\Models\Tag $tag */
@endphp

<div class="col-12">
    <a href="{{ route('pages.blog.post', ['post_id' => $post->getKey()]) }}" class="card p-2 rounded-4 card text-decoration-none">
        <div class="row g-0">
            <div class="col-12">
                <div class="card-body">
                    <h5 class="card-title card-title mb-1">{{ $post->title }}</h5>
                    <div class="mb-2 small text-muted">{{ $post->published_at->diffForHumans() }}</div>
                    <div class="mb-2">
                    @foreach($post->tags as $tag)
                        <x-tag :tag="$tag"/>
                    @endforeach
                    </div>
                    <div class="mb-2"  style="min-height: 6rem">
                        {{ strip_tags(substr($post->content, 0, 300)) }}...
                    </div>
                </div>
            </div>
            <div class="col-12 mb-4 text-center">
                <div class="btn card-more mt-1 d-inline-flex gap-2 px-4">
                    <span class="card-more-dot">&nbsp;</span>
                    <span class="card-more-dot">&nbsp;</span>
                    <span class="card-more-dot">&nbsp;</span>
                </div>
            </div>
        </div>
    </a>
</div>
