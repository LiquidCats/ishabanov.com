@extends('.layouts.default')

@section("title", "Home")

@section('content')
    @include('.pages.home.hero')
    @include('.pages.home.experience')
@endsection
