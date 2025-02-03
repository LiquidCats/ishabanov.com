<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="robots" content="noindex">
    <meta name="robots" content="no-follow">

    <title>{{ config('app.name') }} - @yield('title')</title>

    @include('includes.admin.styles')
</head>
<body class="bg-neutral-50 dark:bg-zinc-900">
<main>
    @yield('content')
</main>
</body>
</html>
