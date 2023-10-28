@extends('layouts.default')

@section("title", "Home")

@section("content")
    @include("pages.home.hero.index")
    @include("pages.home.experience.index")
@stop
