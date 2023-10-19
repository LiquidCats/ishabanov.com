@php
    /** @var App\Data\Database\Eloquent\Models\Post $post */
    /** @var App\Data\Database\Eloquent\Models\Tag $tag */
@endphp

<div class="col-12 col-md-6 col-lg-6">
    <div class="card p-2 rounded-4 card">
        <div class="row g-0">
            <div class="col-12">
                <div class="card-body">
                    <h5 class="card-title card-title mb-1">{{ $post->title }}</h5>
                    <div class="mb-2 small text-muted">{{ $post->published_at->diffForHumans() }}</div>
                    <div class="mb-2">
                    @foreach($post->tags as $tag)
                        <span class="badge rounded-pill text-bg-light p-2">
                            <i class="bi bi-tag mx-1"></i>{{ $tag->name }}
                        </span>
                    @endforeach
                    </div>
                    <div class="mb-2"  style="min-height: 6rem">
                        {{ strip_tags(substr($post->content, 0, 300)) }}...
                    </div>
                </div>
            </div>
            <div class="col-12 mb-4 text-center">
                <a class="btn btn-link card-link card-more mt-1 text-decoration-none d-inline-flex gap-2 px-4"
                   href="{{ route('pages.blog.post', ['post_id' => $post->getKey()]) }}">
                    <span class="card-more-dot">&nbsp;</span>
                    <span class="card-more-dot">&nbsp;</span>
                    <span class="card-more-dot">&nbsp;</span>
                </a>
            </div>
        </div>
    </div>
</div>
