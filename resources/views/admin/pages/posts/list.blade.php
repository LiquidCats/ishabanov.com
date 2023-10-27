@php /** @var App\Data\Database\Eloquent\Models\Post $post */ @endphp
@php /** @var App\Data\Database\Eloquent\Models\Tag $tag */ @endphp

@extends('layouts.admin')

@section('title', 'Posts')

@section('content')
    @include('admin.components.page-header', ['title' => 'Posts'])
    <div class="d-flex flex-row justify-content-start">
        <div><a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Create</a></div>
    </div>
    <div class="d-flex flex-column mt-2">
        <div class="list-group border-bottom">
            @foreach($posts as $post)
                <div class="list-group-item p-3">
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <h2>
                            ID {{ $post->getKey() }}:
                            <a href="{{ route('admin.posts.edit', ['post_id' => $post->getKey()]) }}">{{ $post->title }}</a>
                            @if($post->is_draft)
                                <span class="badge bg-warning text-dark">Draft</span>
                            @else @endif
                        </h2>
                        <div class="d-flex flex-row gap-2">
                            <form method="post"
                                  action="{{ route('admin.posts.state', ['post_id' => $post->getKey()]) }}">
                                 @csrf
                                 @method('patch')
                                <button type="submit" @class(['btn','btn-sm', 'btn-warning' => !$post->is_draft, 'btn-success' => $post->is_draft])>
                                    {{ $post->is_draft ? 'Publish' : 'Hide' }}
                                </button>
                            </form>
                            <form method="post"
                                  action="{{ route('admin.posts.delete', ['post_id' => $post->getKey()]) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                    <div>{{ $post->published_at->diffForHumans() }}</div>
                    <div class="mt-2 ">
                        @foreach($post->tags as $tag)
                            <x-tag :tag="$tag"/>
                        @endforeach
                    </div>

                    <div class="mt-2 accordion" id="post-{{$post->getKey()}}">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#post-preview-{{$post->getKey()}}"
                                        aria-expanded="false"
                                        aria-controls="post-preview-{{$post->getKey()}}">Preview</button>
                            </h2>
                            <div id="post-preview-{{$post->getKey()}}"
                                 class="accordion-collapse collapse"
                                 data-bs-parent="#post-{{$post->getKey()}}">
                                <div class="accordion-body">{!! $post->preview !!}</div>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="d-flex flex-row justify-content-start mt-3">
        <div><a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Create</a></div>
    </div>
    {!! $posts->links() !!}
@stop
