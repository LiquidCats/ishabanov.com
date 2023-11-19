@php /** @var App\Data\Database\Eloquent\Models\PostModel $prev */ @endphp
@php /** @var App\Data\Database\Eloquent\Models\PostModel $next */ @endphp
<div class="row g-2 mt-2">
    <div class="col-md-6">
        <x-posts::prev-next :post="$next" type="next"/>
    </div>
    <div class="col-md-6">
        <x-posts::prev-next :post="$prev" type="prev"/>
    </div>
</div>
