@php /** @var App\Data\Database\Eloquent\Models\Tag $tag */ @endphp

@extends('layouts.admin')

@section('title', 'Tags')

@section('content')
    @include('admin.components.page-header', ['title' => 'Tags'])
    <div class="d-flex flex-row justify-content-start">
        <a href="{{ route('admin.tags.create') }}" class="btn btn-primary">Create</a>
    </div>
    <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white">
        <div class="list-group list-group-flush border-bottom">
            @foreach($tags as $tag)
                <a href="{{ route('admin.tags.edit', ['tag_id' => $tag->getKey()]) }}"
                   class="list-group-item list-group-item-action py-3 lh-tight">
                    <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">#{{ $tag->getKey() }}: {{ $tag->name }}</strong>
                        <small>{{ $tag->created_at->diffForHumans() }}</small>
                    </div>
                    <div class="col-10 mb-1">Posts Count: {{ $tag->getAttribute('posts_count') }}</div>
                    <div class="col-10 mb-1 small">Slug: {{ $tag->slug }}</div>
                    <div class="d-flex flex-row justify-content-end gap-1 mb-1 align-content-end small">
                        <form method="post"
                              action="{{ route('admin.tags.delete', ['tag_id' => $tag->getKey()]) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    <div class="d-flex flex-row justify-content-start my-3">
        <a href="{{ route('admin.tags.create') }}" class="btn btn-primary">Create</a>
    </div>
@stop
