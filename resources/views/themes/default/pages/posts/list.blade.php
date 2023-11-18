@extends('themes.default.layouts.default')

@section("title", "Posts")

@section('content')
    <section id="posts" class="posts py-4 container-fluid position-relative px-1">
          <div class="container">
              <div class="row gy-4">
                  @include('themes.default.pages.posts.includes.nothing')
                  @each('themes.default.pages.posts.includes.list-item', $posts, 'post')
              </div>
              {!! $posts->links() !!}
          </div>
    </section>
@endsection
