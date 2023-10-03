@php
    use App\Data\Database\Eloquent\Models\Post;
    use App\Data\Database\Eloquent\Models\Tag;use App\Foundation\Enums\PostStates;
@endphp
@php /** @var Post $post */ @endphp
@php /** @var Tag $tag */ @endphp

@extends('layouts.admin')

@section('title', 'Posts')

@section('content')
    @include('admin.components.page-header', ['title' => 'Posts'])
    <div class="d-flex flex-row justify-content-start">
        <div><a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Create</a></div>
    </div>
    <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white">
        <div class="list-group list-group-flush border-bottom scrollarea">
            @foreach($posts as $post)
                <a href="{{ route('admin.posts.edit', ['post_id' => $post->getKey()]) }}"
                   class="list-group-item list-group-item-action py-3 lh-tight">
                    <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">
                            #{{ $post->getKey() }}: {{ $post->title }}
                            @if($post->is_draft)
                                <span class="badge bg-warning text-dark">Draft</span>
                            @else @endif
                        </strong>
                        <small>{{ $post->published_at->diffForHumans() }}</small>
                    </div>
                    <div class="col-10 mb-1">
                        @foreach($post->tags as $tag)
                            <span class="badge rounded-pill bg-dark">#{{ $tag->name }}</span>
                        @endforeach
                    </div>
                    <div class="col-10 mb-1 small">
                        {{ substr($post->content, 0, 100) }}...
                    </div>
                    <div class="d-flex flex-row justify-content-end gap-1 mb-1 align-content-end small">
                         <form method="post"
                              action="{{ route('admin.posts.state', ['post_id' => $post->getKey()]) }}">
                            @method('patch')
                            <input type="hidden" name="state" value="{{ $post->is_draft ? PostStates::PUBLISHED->value : PostStates::DRAFT->value}}">
                            <button type="submit" @class(['btn','btn-sm', 'btn-warning' => !$post->is_draft, 'btn-success' => $post->is_draft])>
                                {{ $post->is_draft ? 'Publish' : 'Hide' }}
                            </button>
                        </form>
                        <div>
                            <form method="post"
                                  action="{{ route('admin.posts.delete', ['post_id' => $post->getKey()]) }}">
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    <div class="d-flex flex-row justify-content-start my-3">
        <div>
            <button class="btn btn-primary">Create</button>
        </div>
    </div>
    {!! $posts->links() !!}
@stop
