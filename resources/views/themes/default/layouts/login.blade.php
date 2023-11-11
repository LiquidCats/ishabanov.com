<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Ilya Shabanov - Software Engineer - @yield("title")</title>

        @include('themes.default.includes.styles')
    </head>
    <body>
        <main>
            @yield("content")
        </main>

        @include("themes.default.includes.scripts")
    </body>

</html>
