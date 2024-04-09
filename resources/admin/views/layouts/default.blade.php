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
<body class="bg-stone-900">
    <div class="flex flex-nowrap items-stretch">
        <aside class="bg-neutral-800 p-3 min-h-screen lg:min-w-60">
            <x-admin-sidebar/>
        </aside>
        <main class="grow min-h-screen" id="app"></main>
    </div>
@include('views.components.footer')

@include('views.includes.scripts')
</body>
</html>
