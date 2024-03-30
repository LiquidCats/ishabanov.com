@php
    use Illuminate\View\Component;
@endphp
@php /** @var Component $block */ @endphp

@extends('layouts.default')

@section('content')
    <article id="post" class="text-gray-50">
          <div class="container mx-auto max-w-6xl space-y-3">

              @foreach($blocks as $block)
                  {{ $block->render() }}
              @endforeach

          </div>
    </article>

@endsection
