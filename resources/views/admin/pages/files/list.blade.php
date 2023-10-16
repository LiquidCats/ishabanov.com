@php /** @var App\Data\Database\Eloquent\Models\Tag $tag */ @endphp

@extends('layouts.admin')

@section('title', 'Files')

@section('content')
    @include('admin.components.page-header', ['title' => 'Files'])
    <div class="d-flex flex-row justify-content-start">
        <a href="{{ route('admin.files.create') }}" class="btn btn-primary">Upload</a>
    </div>
    <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white">
        <div class="list-group list-group-flush border-bottom">

        </div>
    </div>
    <div class="d-flex flex-row justify-content-start my-3">
        <a href="{{ route('admin.files.create') }}" class="btn btn-primary">Upload</a>
    </div>
     {!! $files->links() !!}
@stop
