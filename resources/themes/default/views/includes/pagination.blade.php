@php /** @var \Illuminate\Pagination\LengthAwarePaginator $paginator */ @endphp

@if ($paginator->hasPages())
    <nav class="d-flex align-items-center justify-content-center mt-4 gap-3">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <div class="d-block disabled bg-black text-white-50 px-4 py-2 rounded-4" aria-disabled="true">
            <i class="bi bi-arrow-left"></i> @lang('pagination.previous')
        </div>
    @else
        <a class="d-block bg-dark px-4 py-2 rounded-4 text-light text-decoration-none" href="{{ $paginator->previousPageUrl() }}" rel="prev">
            <i class="bi bi-arrow-left"></i> @lang('pagination.previous')
        </a>
    @endif
    <div class="d-flex justify-content-center align-items-center gap-1">
        <div class="bg-black rounded-5" style="height: 10px;width: 10px;">&nbsp;</div>
        <div class="bg-black rounded-5" style="height: 15px;width: 15px;">&nbsp;</div>
        <div class="bg-black rounded-5" style="height: 10px;width: 10px;">&nbsp;</div>
    </div>
    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <a class="d-block bg-dark px-4 py-2 rounded-4 text-light text-decoration-none" href="{{ $paginator->nextPageUrl() }}" rel="next">
            @lang('pagination.next') <i class="bi bi-arrow-right"></i>
        </a>
    @else
        <div class="d-block disabled bg-black text-white-50 px-4 py-2 rounded-4" aria-disabled="true">
            @lang('pagination.next') <i class="bi bi-arrow-right"></i>
        </div>
    @endif
    </nav>
@endif
