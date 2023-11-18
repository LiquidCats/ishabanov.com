<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="robots" content="noindex">
    <meta name="robots" content="follow">

    <title>iShabanov - @yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    @include('admin.components.header')
    <div class="container-fluid">
        <div class="row">
            <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
                <x-admin-sidebar/>
            </div>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            @yield('content')
            </main>
        </div>
    </div>
    @include('admin.components.footer')

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/gwnmmtvbsjz0a1q4aolugs385wc6es97mf904lw4okwjzv8j/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        var imageList = {{ Illuminate\Support\Js::from($images ?? []) }};
        tinymce.init({
            selector: 'textarea.mce-editable', // Replace this CSS selector to match the placeholder element for TinyMCE
            skin: 'bootstrap',
            icons: 'bootstrap',
            tinycomments_mode: 'embedded',
            plugins: [
                'autolink', 'autoresize', 'codesample', 'link', 'lists', 'media',
                'table', 'image', 'quickbars', 'codesample', 'help', 'code',
            ],
            // plugins: 'code table lists link emoticons image',
            toolbar: 'undo redo | formatselect| bold italic underline strikethrough | alignleft aligncenter alignright | indent outdent | bullist numlist | codesample code | table | link | emoticons | image',
            image_list: imageList,
            menubar: false,
            setup: (editor) => {
                editor.on('init', () => {
                  editor.getContainer().style.transition='border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out';
                });
                editor.on('focus', () => {
                  editor.getContainer().style.boxShadow='0 0 0 .2rem rgba(0, 123, 255, .25)';
                  editor.getContainer().style.borderColor='#80bdff';
                });
                editor.on('blur', () => {
                  editor.getContainer().style.boxShadow='';
                  editor.getContainer().style.borderColor='';
                });
            }
        });

        document.addEventListener('focusin', (e) => {
          if (e.target.closest(".tox-tinymce, .tox-tinymce-aux, .moxman-window, .tam-assetmanager-root") !== null) {
            e.stopImmediatePropagation();
          }
        });
    </script>

</body>
</html>
