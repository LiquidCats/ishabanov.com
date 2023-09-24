@extends('layouts.default')

@section('content')
    <h1>Blog</h1>
    @each('pages.blog.post', $posts, 'post')
@stop
