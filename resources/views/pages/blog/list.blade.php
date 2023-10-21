@extends('layouts.default')

@section("title", "Posts")

@section('content')
    <div class="container">

        <div class="row mt-2 mb-5 g-4">
            @if($posts->isEmpty())
                <div class="col-12 text-center">
                    <img src="{{ asset('images/void.svg') }}" alt="nothing" class="img-fluid mx-auto d-block" style="max-width: 320px">
                    <div class="mt-5">
                        <span class="h1">There is not posts yet</span>
                    </div>
                    <div class="mt-2">
                        <a href="{{ back()->getTargetUrl() }}" class="btn btn-lg btn-outline-primary">
                            <i class="bi bi-chevron-left"></i>
                            Go Back
                        </a>
                    </div>
                </div>
            @endif
            @each('pages.blog.list-item', $posts, 'post')
        </div>

        {!! $posts->links() !!}
    </div>
@stop
