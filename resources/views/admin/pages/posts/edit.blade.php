@php /** @var App\Data\Database\Eloquent\Models\TagModel $tag */ @endphp
@php /** @var App\Data\Database\Eloquent\Models\PostModel $post */ @endphp
@php /** @var Illuminate\Support\Collection $postTagIds */ @endphp
@extends('admin.layouts.default')

@section('title', 'Create New Post')

@section('content')
    @include('admin.components.page-header', ['title' => 'Edit Post #' . $post->getKey()])
    <form method="POST" action="{{ route('admin.posts.update', ['post_id' => $post->getKey()]) }}">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="post-title" class="form-label">Title</label>
            <input type="text"
                   name="title"
                   value="{{ old('title', $post->title) }}"
                   class="form-control"
                   id="post-title"
                   placeholder="Tile">
        </div>
        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="post-published-at" class="form-label">Published At</label>
            <input type="text"
                   name="published_at"
                   value="{{ old('published_at', $post->published_at->toDateTimeString('minutes')) }}"
                   class="form-control"
                   id="post-published-at" placeholder="Published At"/>
        </div>
        @error('published_at')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" name="is_draft" type="checkbox"
                       id="post-is-draft" @checked(old('is_draft', $post->is_draft))>
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
                    <option
                        value="{{ $tag->getKey() }}" @selected($postTagIds->contains($tag->getKey()))>{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="post-content" class="form-label">Preview</label>
            <textarea class="form-control mce-editable" name="preview" id="post-content" rows=30" placeholder="Preview">
                {{ old('preview', $post->preview) }}
            </textarea>
        </div>

        <div class="mb-3">
            <label for="post-content" class="form-label">Content</label>
            <textarea class="form-control mce-editable" name="content" id="post-content" rows=30" placeholder="Content">
                {{ old('content', $post->content) }}
            </textarea>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection
