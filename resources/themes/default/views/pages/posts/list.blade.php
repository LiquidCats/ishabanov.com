@extends('.layouts.default')

@section("title", "Posts")

@section('content')
    <section id="posts" class="posts py-4 container-fluid position-relative px-1">
          <div class="container">
              <div class="row gy-4">
                  @include('.pages.posts.includes.nothing')
                  @each('.pages.posts.includes.list-item', $posts, 'post')
              </div>
              {!! $posts->links('includes.pagination') !!}
          </div>
    </section>
@endsection
