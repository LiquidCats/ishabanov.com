@php /** @var App\Data\Database\Eloquent\Models\Post $post */ @endphp
@php /** @var App\Data\Database\Eloquent\Models\Tag $tag */ @endphp
@extends('themes.default.layouts.default')

@section('title', $post->title)
@section('preview', strip_tags($post->preview))
@section('published_time', $post->published_at->toAtomString())
@section('self_url', route('pages.blog', ['post_id' => $post?->getKey()]))

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <a class="btn btn-primary" href="{{ route('pages.blog') }}"><i class="bi bi-chevron-left"></i> Posts</a>
            </div>
        </div>
        <div class="row">
            <article class="col-8 mt-3 mb-2">
                <h1>{{ $post->title }}</h1>
                <div class="text-muted small">
                    {{ $post->published_at->toAtomString() }}
                </div>
                <hr>
                <div class="mb-3">
                    @foreach ($post->tags as $tag)
                        <x-tag :tag="$tag" />
                    @endforeach
                </div>

                {!! $post->preview !!}
                {!! $post->content !!}
            </article>
            @include('pages.blog.post-latests')
        </div>
        @include('pages.blog.post-footer')
    </div>
@endsection

