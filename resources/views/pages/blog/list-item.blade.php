@php
    /** @var App\Data\Database\Eloquent\Models\Post $post */
    /** @var App\Data\Database\Eloquent\Models\Tag $tag */
@endphp

<div class="col-12 col-md-6 col-lg-6">
    <div class="card text-center p-2 rounded-4 lc-card">
        <div class="row g-0">
            <div class="col-12-auto mx-auto">
                <div class="card-body lc-card-body">
                    <h5 class="card-title lc-card-title m-0">{{ $post->title }}</h5>
                    <div>@foreach($post->tags as $tag) <small class="badge bg-secondary">{{ $tag->name }}</small> @endforeach</div>
                    <div class="card-subtitle my-1 small text-muted">
                        {{ $post->published_at->diffForHumans() }}
                    </div>
                    <div class="card-text text-left m-0"  style="min-height: 6rem">
                        {{ strip_tags(substr($post->content, 0, 300)) }}
                    </div>
                </div>
            </div>
            <div class="col-12 mb-4">
                <a class="btn btn-link card-link lc-card-more mt-1 text-decoration-none d-inline-flex gap-2 px-4"
                   href="{{ route('pages.blog.post', ['post_id' => $post->getKey()]) }}">
                    <span class="lc-card-more-dot">&nbsp;</span>
                    <span class="lc-card-more-dot">&nbsp;</span>
                    <span class="lc-card-more-dot">&nbsp;</span>
                </a>
            </div>
        </div>
    </div>
</div>
