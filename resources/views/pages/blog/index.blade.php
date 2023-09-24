@extends('layouts.default')

@section('content')
    <div class="container">
            <h1>Blog</h1>

            @each('pages.blog.post', $posts, 'post')

            {!! $posts->links() !!}
    </div>
@stop
