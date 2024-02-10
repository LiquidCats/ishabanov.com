<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @include('includes.preview')

    <title>Ilya Shabanov - Software Engineer - @yield("title")</title>

    @include('includes.styles')
</head>
<body>
<x-header/>

<main class="position-relative z-1">
    @yield("content")
</main>

<x-footer/>

@include("includes.scripts")
</body>

</html>
