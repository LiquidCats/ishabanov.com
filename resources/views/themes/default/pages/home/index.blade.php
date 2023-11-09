@extends('themes.default.layouts.default')

@section("title", "Home")

@section('content')
    @include('themes.default.pages.home.hero')
    @include('themes.default.pages.home.experience')
@endsection

