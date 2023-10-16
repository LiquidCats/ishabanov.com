<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>iShabanov - @yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
    @include('admin.components.header')
    <div class="container-fluid">
        <div class="row">
            @include('admin.components.nav')
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            @yield('content')
            </main>
        </div>
    </div>
   @include('admin.components.footer')


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
     <script src="https://cdn.tiny.cloud/1/gwnmmtvbsjz0a1q4aolugs385wc6es97mf904lw4okwjzv8j/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
     <script>
       tinymce.init({
           selector: 'textarea.mce-editable', // Replace this CSS selector to match the placeholder element for TinyMCE
           tinycomments_mode: 'embedded',
           plugins: 'code table lists link emoticons',
           toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table | link | emoticons'
       });
     </script>

</body>
</html>
