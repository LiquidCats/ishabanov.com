<meta name="title" content="Ilya Shabanov - Software Engineer - @yield('title')">
@hasSection('preview')
    <meta name="description" content="@yield('preview')">

    <meta property="og:site_name" content="iShabanov">
    <meta property="og:type" content="article">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('preview')">
    <meta property="og:url" content="@yield('self_url')">
    <meta property="og:image" content="@yield('preview_image')">

    <meta property="article:published_time" content="@yield('published_time')">
@endif
