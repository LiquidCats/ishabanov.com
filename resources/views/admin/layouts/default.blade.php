<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="robots" content="noindex">
    <meta name="robots" content="follow">

    <title>Admin</title>

    @include('admin.includes.styles')
</head>
<body>
    @include('admin.components.header')
    <div class="container-fluid">
        <div class="row">
            <x-admin-sidebar/>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" id="app">
            </main>
        </div>
    </div>
    @include('admin.components.footer')

    @include('admin.includes.scripts')
</body>
</html>
