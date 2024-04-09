<div class="my-3 bg-night rounded-xl p-6">
    @foreach($content as $item )
        {{ $item->render() }}
    @endforeach
</div>
