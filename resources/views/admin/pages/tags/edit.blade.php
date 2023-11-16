@php /** @var App\Data\Database\Eloquent\Models\TagModel $tag */ @endphp
@extends('admin.layouts.default')

@section('title', 'Edit Tag')

@section('content')
    @include('admin.components.page-header', ['title' => 'Edit Tag #' . $tag->getKey()])
    @pushonce('form_action'){{ route('admin.tags.update', ['tag_id' => $tag->getKey()])  }}@endpushonce
    @pushonce('form_method')
        @method('put')
    @endpushonce
    @include('admin.pages.tags.includes.form', ['tag' => $tag])
@stop
