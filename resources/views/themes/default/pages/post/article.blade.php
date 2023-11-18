@php /** @var App\Data\Database\Eloquent\Models\PostModel $post */ @endphp
@php /** @var App\Data\Database\Eloquent\Models\TagModel $tag */ @endphp
@extends('themes.default.layouts.default')

@section('title', $post->title)
@section('preview', strip_tags($post->preview))
@section('published_time', $post->published_at->toAtomString())
@section('self_url', route('pages.blog.post', ['post_id' => $post?->getKey()]))

@section('content')
    <section id="post" class="post container-fluid pt-5 pb-4 position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <article class="post__article p-4 rounded-4">
                        <h1 class="mb-0">{{ $post->title }}</h1>
                        <small>{{ $post->published_at->diffForHumans() }}</small>
                        <div class="my-3">
                            @foreach ($post->tags as $tag)
                                <x-tag :tag="$tag"/>
                            @endforeach
                        </div>
                        {!! $post->preview !!}
                        {!! $post->content !!}
                        <footer class="row g-2">
                            @include('themes.default.pages.post.similar')
                        </footer>
                    </article>
                </div>
            </div>
            @include('themes.default.pages.post.footer')
        </div>
    </section>
@endsection

