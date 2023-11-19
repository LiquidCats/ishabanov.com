@production
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-5WBHV3DLQ3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-5WBHV3DLQ3');
</script>
@endproduction

@vite('resources/js/themes/default/scripts.js')
@stack('scripts')
