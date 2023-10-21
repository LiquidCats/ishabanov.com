<a href="{{ $link ?? '#' }}" class="card card text-decoration-none">
   <div class="card-body card-body">
       <div class="row">
           @if($type === 'next')
           <div class="col-1 d-flex align-items-center justify-content-center">
               <i class="bi bi-chevron-double-left"></i>
           </div>
           @endif

            <div class="col-11">
               <p class="mb-1 text-muted">
                   @switch($type)
                   @case('next')
                       Next
                       @break
                   @case('prev')
                       Previous
                       @break
                   @endswitch
               </p>
               <p class="h5">{{ $title ?? "" }}</p>
           </div>

           @if($type === 'prev')
           <div class="col-1 d-flex align-items-center justify-content-center">
               <i class="bi bi-chevron-double-right"></i>
           </div>
           @endif
       </div>
   </div>
</a>
