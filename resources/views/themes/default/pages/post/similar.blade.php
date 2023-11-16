@php /** @var App\Data\Database\Eloquent\Models\PostModel $similarPost */ @endphp

@if($similar->isNotEmpty())
    <div class="col-12"><h4>Similar</h4></div>
    @foreach($similar as $similarPost)
        <div class="col-12 col-lg-4">
            <a href="{{ route('pages.blog.post', ['post_id' => $prev->getKey()]) }}"
               class="post__similar d-block rounded-3 text-white bg-dark shadow-sm p-3 text-decoration-none">
                <h5 class="mb-0">{{ $similarPost->title }}</h5>
                <small>{{ $similarPost->published_at->diffForHumans() }}</small>
                <div class="post__similar__preview mt-2">{{ strip_tags($similarPost->preview) }}</div>
            </a>
        </div>
    @endforeach
@endif

