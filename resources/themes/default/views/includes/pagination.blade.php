@php /** @var \Illuminate\Pagination\LengthAwarePaginator $paginator */ @endphp

@if ($paginator->hasPages())
    <nav class="flex items-center justify-center mt-4 gap-3 mx-auto">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <div class="bg-gray-500 text-gray-400 px-4 py-2 rounded-md flex items-center gap-1" aria-disabled="true">
                <x-heroicon-o-arrow-left class="size-5"/> @lang('pagination.previous')
            </div>
        @else
            <a class="block bg-gray-200 hover:bg-gray-300 duration-300 hover:gap-3 px-4 py-2 rounded-md text-stone-700 no-underline flex items-center gap-1" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                <x-heroicon-o-arrow-left class="size-5"/> @lang('pagination.previous')
            </a>
        @endif
        <div class="flex content-center items-center gap-1">
            <div class="bg-gray-500 rounded-full size-2"></div>
            <div class="bg-gray-500 rounded-full size-4"></div>
            <div class="bg-gray-500 rounded-full size-2"></div>
        </div>
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="block bg-gray-200 hover:bg-gray-300 duration-300 hover:gap-3 px-4 py-2 rounded-md text-stone-700 no-underline flex items-center gap-1" href="{{ $paginator->nextPageUrl() }}" rel="next">
                @lang('pagination.next') <x-heroicon-o-arrow-right class="size-5"/>
            </a>
        @else
            <div class="bg-gray-500 text-gray-400 px-4 py-2 rounded-md flex items-center gap-1" aria-disabled="true">
                @lang('pagination.next') <x-heroicon-o-arrow-right class="size-5"/>
            </div>
        @endif
    </nav>
@endif
