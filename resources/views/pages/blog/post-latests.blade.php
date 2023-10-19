@php /** @var App\Data\Database\Eloquent\Models\Post $latestPost */ @endphp
<div class="col-4">
    <div class="row"><div class="col"><h4>Similar</h4></div></div>
    @foreach($latest as $latestPost)
    <div class="row">
        <div class="col">
            <a  href="{{ route('pages.blog.post', ['post_id' => $prev->getKey()]) }}" class="card card mb-3 text-decoration-none">
                <div class="card-body card-body">
                    <div class="mb-2">
                        <h5 class="card-title mb-0">{{ $latestPost->title }}</h5>
                        <div class="small text-muted">{{ $latestPost->published_at->diffForHumans() }}</div>
                    </div>

                    <div>@foreach($latestPost->tags as $tag) <span class="badge bg-secondary">{{ $tag->name }}</span> @endforeach</div>
                    <div class="card-text">{{ strip_tags(substr($latestPost->content, 0, 100)) }}</div>
                </div>
            </a>

        </div>
    </div>

    @endforeach
</div>
