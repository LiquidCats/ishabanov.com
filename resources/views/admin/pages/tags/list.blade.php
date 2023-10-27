@php /** @var App\Data\Database\Eloquent\Models\Tag $tag */ @endphp

@extends('layouts.admin')

@section('title', 'Tags')

@section('content')
    @include('admin.components.page-header', ['title' => 'Tags'])
    <div class="d-flex flex-row justify-content-start">
        <a href="{{ route('admin.tags.create') }}" class="btn btn-primary">Create</a>
    </div>
    <div class="d-flex flex-column mt-2">
        <div class="list-group border-bottom">
            @foreach($tags as $tag)
                <div class="list-group-item p-3">
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <h2>
                            <span>ID {{ $tag->getKey() }}:</span>
                            <a href="{{ route('admin.tags.edit', ['tag_id' => $tag->getKey()]) }}">{{ $tag->name }}</a>
                        </h2>
                        <div class="d-flex flex-row gap-2">
                            <form method="post"
                                  action="{{ route('admin.tags.delete', ['tag_id' => $tag->getKey()]) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                    <div>{{ $tag->created_at->diffForHumans() }}</div>
                    <div>Posts Count: {{ $tag->getAttribute('posts_count') }}</div>
                    <div>Slug: {{ $tag->slug }}</div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="d-flex flex-row justify-content-start my-3">
        <a href="{{ route('admin.tags.create') }}" class="btn btn-primary">Create</a>
    </div>
@stop
