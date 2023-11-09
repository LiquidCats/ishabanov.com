@extends('themes.default.layouts.default')

@section("title", "Posts")

@section('content')
    <div class="container">

        <div class="row mt-2 mb-5 g-4">
            @if($posts->isEmpty())
                <div class="col-12 text-center">
                    <div class="mt-2 mb-5">
                        <div class="fs-1">¯\_(ツ)_/¯</div>
                        <div class="fs-1">I haven't written anything yet</div>
                    </div>
                    <img src="{{ asset('images/void.svg') }}" alt="nothing" class="img-fluid mx-auto d-block" style="max-height: 320px">

                    <div class="mt-3">
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
