@extends('themes.default.layouts.default')

@section("title", "Posts")

@section('content')
    <section id="posts" class="posts pt-5 pb-4 container-fluid position-relative">
          <div class="container">
              <div class="row">
                  @include('themes.default.pages.posts.includes.nothing')
                  @each('themes.default.pages.posts.includes.list-item', $posts, 'post')
              </div>
              {!! $posts->links() !!}
          </div>
    </section>
@endsection
