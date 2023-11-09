<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        @include('themes.default.includes.preview')

        <title>Ilya Shabanov - Software Engineer - @yield("title")</title>

        @include('themes.default.includes.styles')
    </head>
    <body>
        <header class="sticky-top">
            <x-navbar/>
        </header>
        <main class="position-relative z-1">
            @yield("content")
        </main>

        @include("themes.default.includes.footer")

        @include("themes.default.includes.scripts")
    </body>

</html>
