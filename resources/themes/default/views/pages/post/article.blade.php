@php /** @var App\Data\Database\Eloquent\Models\PostModel $post */ @endphp
@php /** @var App\Data\Database\Eloquent\Models\TagModel $tag */ @endphp
@extends('.layouts.default')

@section('title', $post->title)
@section('preview', strip_tags($post->preview))
@if($post?->previewImage)
    @section('preview_image', $post?->previewImage?->getFileUrl())
@endif
@section('published_time', $post->published_at->toAtomString())
@section('self_url', route('pages.blog.post', ['post_id' => $post?->getKey()]))

@section('content')
    <section id="post">
        <article class="container max-w-6xl mx-auto text-gray-50">
            @if($post->preview_image_id !== null)
                <header class="h-96 rounded-xl mb-3 overflow-hidden bg-cover bg-no-repeat bg-center"
                     style="background-image: url('{{ $post->previewImage?->getFileUrl() }}')">
                    <div class="h-full flex flex-col justify-end p-6 bg-gradient-to-t from-night from-20% to-transparent">
                        <h1 class="mb-3 text-6xl font-serif font-bold">{{ $post->title }}</h1>
                        <small class="block mb-3">{{ $post->published_at->diffForHumans() }} | reading time {{ $post->reading_time }}</small>
                        <div class="flex flex-wrap gap-1">
                            @foreach ($post->tags as $tag)
                                <x-tag type="light">{{ $tag->name }}</x-tag>
                            @endforeach
                        </div>
                    </div>
                </header>
            @endif
            @if($post->preview_image_id === null)
                <header>
                    <h1 class="mb-3 text-6xl font-serif font-bold">{{ $post->title }}</h1>
                    <small class="block mb-3">{{ $post->published_at->diffForHumans() }} | reading time {{ $post->reading_time }}</small>
                    <div class="my-3">
                        @foreach ($post->tags as $tag)
                            <x-tag>{{ $tag->name }}</x-tag>
                        @endforeach
                    </div>
                </header>

            @endif

            @foreach($blocks as $block)
                {{ $block->render() }}
            @endforeach

            <footer class="mt-6 mb-3">
                @include('pages.post.similar')
            </footer>
            @include('pages.post.footer')
        </article>
    </section>
@endsection

