<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

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

@production
    @vite
@endproduction

@env('local')
    @client
{{--    @tag('scripts')--}}
    @tag('styles')
@endenv

@env('testing')
    @client
{{--    @tag('scripts')--}}
    @tag('styles')
@endenv

