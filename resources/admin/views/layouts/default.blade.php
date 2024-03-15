<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="robots" content="noindex">
    <meta name="robots" content="follow">

    <title>iShabanov - Admin</title>

    @include('views.includes.styles')
</head>
<body class="bg-neutral-900">
<div class="container mx-auto">
    <div class="grid lg:grid-cols-6 md:grid-cols-4 grid-cols-6 gap-4">
        <x-admin-sidebar/>
        <main class="lg:col-span-5 md:col-span-3 col-span-5" id="app"></main>
    </div>
</div>
@include('views.components.footer')

@include('views.includes.scripts')
</body>
</html>
