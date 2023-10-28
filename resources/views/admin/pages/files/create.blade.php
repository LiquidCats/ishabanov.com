@extends('layouts.admin')

@section('title', 'File Upload')

@section('content')
    @include('admin.components.page-header', ['title' => 'File Upload'])
    <form method="POST" action="{{ route('admin.files.store') }}" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="mb-3">
            <label for="file-name" class="form-label">File Name</label>
            <input type="text"
                   name="name"
                   value="{{ old('name') }}"
                   class="form-control" id="file-name"
                   placeholder="Filename">
        </div>
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="media-file" class="form-label">File</label>
            <input class="form-control"
                   type="file"
                   name="file"
                   id="media-file">
        </div>
        @error('file')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection
