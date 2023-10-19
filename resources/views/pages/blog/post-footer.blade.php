@php /** @var App\Data\Database\Eloquent\Models\Post $prev */ @endphp
@php /** @var App\Data\Database\Eloquent\Models\Post $next */ @endphp
<div class="row mb-5">
    <div class="col-md-6">
     @if($next)
        <a href="{{ route('pages.blog.post', ['post_id' => $next->getKey()]) }}" class="card card text-decoration-none">
           <div class="card-body card-body">
               <div class="row">
                   <div class="col-1 d-flex align-content-center align-items-center justify-content-center">
                       <i class="bi bi-chevron-double-left"></i>
                   </div>
                    <div class="col-11">
                       <p class="card-text mb-1">Next</p>
                       <h5 class="card-title">{{ $next->title }}</h5>
                   </div>
               </div>
           </div>
        </a>
    @endif
    </div>
    <div class="col-md-6">
    @if($prev)
        <a href="{{ route('pages.blog.post', ['post_id' => $prev->getKey()]) }}" class="card card text-decoration-none">
           <div class="card-body card-body">
               <div class="row">
                   <div class="col-11">
                       <p class="card-text mb-1">Previous</p>
                       <h5 class="card-title">{{ $prev->title }}</h5>
                   </div>
                   <div class="col-1 d-flex align-content-center align-items-center justify-content-center">
                       <i class="bi bi-chevron-double-right"></i>
                   </div>
               </div>
           </div>
        </a>
    @endif
    </div>
</div>
