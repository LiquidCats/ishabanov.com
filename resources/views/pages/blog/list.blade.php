@extends('layouts.default')

@section("title", "Posts")

@section('content')
    <div class="container">

        <div class="row my-5 g-4">
            @each('pages.blog.list-item', $posts, 'post')
        </div>

        {!! $posts->links() !!}
    </div>
@stop
