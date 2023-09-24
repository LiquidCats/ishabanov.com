<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Ilya Shabanov - Software Engineer</title>
        @include("includes.assets")

    </head>
    <body>
        <header class="p-3 bg-dark text-white">
            <x-navbar/>
        </header>

        @yield("content")

        @include("includes.footer")

        <script defer>
            feather.replace()
        </script>
    </body>

</html>
