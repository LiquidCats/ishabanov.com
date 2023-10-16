@php /** @var App\Data\Database\Eloquent\Models\Post $post */ @endphp
@php /** @var App\Data\Database\Eloquent\Models\Tag $tag */ @endphp

@extends('layouts.default')

@section("title", $post->title)

@section("content")
    <div class="container">
        <div class="row">
            <div class="col mt-5">
                <a class="btn btn-primary" href="{{ route('pages.blog') }}"><i class="bi bi-chevron-left"></i>Posts</a>
            </div>
        </div>
        <div class="row">
            <div class="col-8 mt-3 mb-2">
                <h1>{{ $post->title }}</h1>
                <div class="text-muted small">
                    {{ $post->published_at->diffForHumans() }}
                </div>
                <hr>
                <div class="mb-3">
                @foreach($post->tags as $tag)
                    <span class="badge bg-secondary">{{ $tag->name }}</span>
                @endforeach
                </div>

                {!! $post->content !!}
            </div>
            @include('pages.blog.post-latests')
        </div>
        @include('pages.blog.post-footer')
    </div>
@endsection

