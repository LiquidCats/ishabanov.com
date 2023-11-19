@php /** @var App\Data\Database\Eloquent\Models\TagModel $tag */ @endphp
@extends('admin.layouts.default')

@section('title', 'Create New Post')

@section('content')
    @include('admin.components.page-header', ['title' => 'Creat New Post'])
    @pushonce('form_action'){{ route('admin.posts.store') }}@endpushonce
    @pushonce('form_method')
        @method('post')
    @endpushonce
    @include('admin.pages.posts.includes.form', ['post' => $post])
@endsection
