@php /** @var App\Data\Database\Eloquent\Models\PostModel $post */ @endphp
@php /** @var App\Data\Database\Eloquent\Models\TagModel $tag */ @endphp
@extends('themes.default.layouts.default')

@section('title', $post->title)
@section('preview', strip_tags($post->preview))
@if($post?->previewImage)
    @section('preview_image', asset('storage/' . $post?->previewImage?->getFileUrl()))
@endif
@section('published_time', $post->published_at->toAtomString())
@section('self_url', route('pages.blog.post', ['post_id' => $post?->getKey()]))

@section('content')
    <section id="post" class="post container-fluid pt-5 pb-4 position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <article class="post__article p-4 rounded-4">
                        @if($post->preview_image_id !== null && $post->preview_image_type !== null)
                            <div class="post__article__preview px-4 pb-4 rounded-3 mb-3 position-relative overflow-hidden"
                                 style="background-image: url('{{ $post->previewImage?->getFileUrl() }}')">
                                <header class="position-relative z-1">
                                    <h1 class="mb-0 text-light">{{ $post->title }}</h1>
                                    <small class="text-light">{{ $post->published_at->diffForHumans() }} | reading time {{ $post->reading_time }}</small>
                                    <div class="mt-3">
                                    @foreach ($post->tags as $tag)
                                        <x-tag type="light">{{ $tag->name }}</x-tag>
                                    @endforeach
                                    </div>
                                </header>
                            </div>
                        @endif
                        @if($post->preview_image_id === null && $post->preview_image_type === null)
                            <header>
                                <h1 class="mb-0">{{ $post->title }}</h1>
                                <small>{{ $post->published_at->diffForHumans() }} | reading time {{ $post->reading_time }}</small>
                                <div class="my-3">
                                @foreach ($post->tags as $tag)
                                    <x-tag>{{ $tag->name }}</x-tag>
                                @endforeach
                                </div>
                            </header>

                        @endif

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

