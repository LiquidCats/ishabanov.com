@php /** @var App\Data\Database\Eloquent\Models\PostModel $prev */ @endphp
@php /** @var App\Data\Database\Eloquent\Models\PostModel $next */ @endphp
<div class="grid md:grid-cols-2 gap-3">
    @if(!$next) <div></div> @endif
    <x-posts::prev-next :post="$next" type="next"/>
    @if(!$prev) <div></div>@endif
    <x-posts::prev-next :post="$prev" type="prev"/>
</div>
