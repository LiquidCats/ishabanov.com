@extends('admin.layouts.default')

@section('title', 'Create Tag')

@section('content')
    @include('admin.components.page-header', ['title' => 'Create Tag'])
    @pushonce('form_action'){{ route('admin.tags.store') }}@endpushonce
    @pushonce('form_method')
        @method('post')
    @endpushonce
    @include('admin.pages.tags.includes.form', ['tag' => $tag])
@stop
