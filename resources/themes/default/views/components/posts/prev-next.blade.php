<a href="{{ $link ?? '#' }}" class="block bg-night hover:bg-stone-500 duration-300 px-3 py-1 rounded-xl text-gray-50 no-underline flex flex-row items-center">
   @if($type === 'next')
   <x-heroicon-o-arrow-left class="size-5" />

   @endif

    <div @class(['grow', 'flex', 'flex-col', 'items-end' => $type === 'next', 'items-start' => $type === 'prev']) >
       <small>
           @switch($type)
           @case('next')
               Next
               @break
           @case('prev')
               Previous
               @break
           @endswitch
       </small>
       <h3 class="text-lg">{{ $title ?? "" }}</h3>
   </div>

   @if($type === 'prev')
   <x-heroicon-o-arrow-right class="size-5" />
   @endif
</a>
