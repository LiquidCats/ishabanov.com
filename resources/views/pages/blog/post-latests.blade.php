@php /** @var App\Data\Database\Eloquent\Models\Post $latestPost */ @endphp

<div class="col-4">
    <div class="row"><div class="col"><h4>Similar</h4></div></div>
    @if($latest->isEmpty())
        <div>No similar posts</div>
    @endif
    @foreach($latest as $latestPost)
    <div class="row">
        <div class="col">
            <a  href="{{ route('pages.blog.post', ['post_id' => $prev->getKey()]) }}" class="card card mb-3 text-decoration-none">
                <div class="card-body">
                    <div class="mb-2">
                        <div class="h5 mb-0">{{ $latestPost->title }}</div>
                        <div class="small text-muted">{{ $latestPost->published_at->diffForHumans() }}</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endforeach
</div>
