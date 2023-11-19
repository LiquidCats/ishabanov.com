<a href="{{ $link ?? '#' }}" class="post__nav d-block bg-white px-3 py-1 rounded-3 text-black text-decoration-none d-flex flex-row align-items-center">
   @if($type === 'next')
   <i class="bi bi-chevron-double-left"></i>

   @endif

    <div @class(['col', 'text-end' => $type === 'next', 'text-start' => $type === 'prev']) >
       <small class="mb-1 text-muted">
           @switch($type)
           @case('next')
               Next
               @break
           @case('prev')
               Previous
               @break
           @endswitch
       </small>
       <h5>{{ $title ?? "" }}</h5>
   </div>

   @if($type === 'prev')
   <i class="bi bi-chevron-double-right"></i>
   @endif
</a>
