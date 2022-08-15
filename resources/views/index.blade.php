<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>LiquidCats aka Ilia Shabanov - Software Developer</title>
        @include("assets")

    </head>
    <body>
        @include("hero.index")
        @include("about.index")
        @include("experience.index")

        @include("contacts.index")

        @include("footer")

        @stack('modals')

        <script defer>
            feather.replace()
        </script>
    </body>

</html>
