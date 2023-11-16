@php /** @var App\Data\Database\Eloquent\Models\TagModel $tag */ @endphp
@php /** @var App\Data\Database\Eloquent\Models\PostModel $post */ @endphp
@php /** @var Illuminate\Support\Collection $postTagIds */ @endphp
@extends('admin.layouts.default')

@section('title', 'Create New Post')

@section('content')
    @include('admin.components.page-header', ['title' => 'Edit Post #' . $post->getKey()])
    @pushonce('form_action'){{ route('admin.posts.update', ['post_id' => $post->getKey()]) }}@endpushonce
    @pushonce('form_method')
        @method('put')
    @endpushonce
    @include('admin.pages.posts.includes.form', ['post' => $post])
@endsection
