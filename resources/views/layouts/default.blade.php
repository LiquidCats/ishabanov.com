<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <meta name="title" content=@yield("title")>
        @hasSection('preview')
            <meta property="og:type" content="article">
            <meta property="og:title" content="@yield("title")">
            <meta name="description" content="@yield("preview")">
            <meta property="og:description" content="@yield("preview")">
            <meta property="article:published_time" content="@yield("published_time")">
            <meta property="og:url" content="@yield("self_url")">
{{--            <meta property="og:image" content="https://i.kod.ru/rs:fill/w:1920/q:85/plain/https%3A%2F%2Fadmin.kod.ru%2Fcontent%2Fimages%2F2023%2F10%2Fimage_2023-10-27_030241768.png">--}}
        @endif

        <title>Ilya Shabanov - Software Engineer - @yield("title")</title>
        @include("includes.assets")
    </head>
    <body>
        <header class="p-3 bg-dark text-white">
            <x-navbar/>
        </header>
        <main>
            @yield("content")
        </main>

        @include("includes.footer")
        @stack('modals')
    </body>

</html>
