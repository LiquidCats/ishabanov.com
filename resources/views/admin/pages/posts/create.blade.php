@php use App\Data\Database\Eloquent\Models\Tag; @endphp
@php /** @var Tag $tag */ @endphp
@extends('layouts.admin')

@section('title', 'Create New Post')

@section('content')
    @include('admin.components.page-header', ['title' => 'Creat New Post'])
    <form method="POST" action="{{ route('admin.posts.store') }}">
        @dump($errors)
        @csrf
        @method('post')
        <div class="mb-3">
            <label for="post-title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="post-title" placeholder="Tile">
        </div>
       @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="post-published-at" class="form-label">Published At</label>
            <input type="text" name="published_at" value="{{ now()->toDateTimeString('minutes') }}" class="form-control" id="post-published-at" placeholder="Published At"/>
        </div>
        @error('published_at')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" name="is_draft" type="checkbox" id="post-is-draft">
                <label class="form-check-label" for="post-is-draft">Draft</label>
            </div>
        </div>
        @error('is_draft')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="post-tags" class="form-label">Tags</label>
            <select class="form-select" id="post-tags" name="post_tags[]" multiple aria-label="multiple select example">
                @foreach($tags as $tag)
               <option value="{{ $tag->getKey() }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="post-content" class="form-label">Content</label>
            <textarea class="form-control" name="content" id="post-content" rows=15" placeholder="Content"></textarea>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary" @disabled($errors->isNotEmpty())>Create</button>
        </div>
    </form>
@endsection
