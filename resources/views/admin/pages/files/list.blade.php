@extends('layouts.admin')

@section('title', 'Files')

@section('content')
    @include('admin.components.page-header', ['title' => 'Files'])
    <div class="d-flex flex-row justify-content-start">
        <a href="{{ route('admin.files.create') }}" class="btn btn-primary">Upload</a>
    </div>
    <div class="mt-2">
        <div class="row">
            @each('admin.pages.files.list-item', $files, 'file')
        </div>
    </div>
    <div class="d-flex flex-row justify-content-start my-3">
        <a href="{{ route('admin.files.create') }}" class="btn btn-primary">Upload</a>
    </div>
     {!! $files->links() !!}
@stop
