@extends('.layouts.default')

@section("title", "Posts")

@section('content')
    <section id="posts">
          <div class="container mx-auto max-w-6xl space-y-3">
              @include('pages.posts.includes.nothing')
              @each('pages.posts.includes.list-item', $posts, 'post')
              {!! $posts->links('includes.pagination') !!}
          </div>
    </section>
@endsection
