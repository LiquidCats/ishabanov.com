@php /** @var App\Data\Database\Eloquent\Models\Post $prev */ @endphp
@php /** @var App\Data\Database\Eloquent\Models\Post $next */ @endphp
<div class="row g-2">
    <div class="col-md-6">
        <x-posts::prev-next :post="$next" type="next"/>
    </div>
    <div class="col-md-6">
        <x-posts::prev-next :post="$prev" type="prev"/>
    </div>
</div>
