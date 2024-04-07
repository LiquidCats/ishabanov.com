<div class="flex group flex-row gap-6 bg-night duration-300 hover:bg-stone-800 rounded-xl text-gray-400 hover:text-gray-200 items-center relative p-3">
    <a href="{{ $link ?? '#' }}" class="absolute -inset-1"></a>
    @if($type === 'next')
    <div>
        <x-heroicon-o-arrow-left class="size-8 text-gray-50 translate-x-1.5 group-hover:translate-x-0 duration-300" />
    </div>
    @endif
    <div class="overflow-hidden truncate grow">
        @if($type === 'next')<div class="text-sm text-gray-500 text-end">next</div>@endif
        @if($type === 'prev')<div class="text-sm text-gray-500 text-start">previous</div>@endif
        <h3 class="m-0 truncate">{{ $title ?? "" }}</h3>
    </div>

    @if($type === 'prev')
    <div>
        <x-heroicon-o-arrow-right class="size-8 text-gray-50 -translate-x-1.5 group-hover:translate-x-0 duration-300" />
    </div>
    @endif
</div>
