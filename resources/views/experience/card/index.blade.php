<div class="g-col-12 g-col-md-6 g-col-lg-6">
    <div class="card text-center p-2 rounded-4 lc-card">
        <div class="row g-0">
            <div class="col-12 col-lg align-self-center p-4 p-lg-2">
                <img src="{{ asset($experience->company_logo) }}" class="d-block mx-auto"
                     alt="{{ $experience->company_name }}">
            </div>
            <div class="col-12 col-lg-auto mx-auto">
                @include("experience.card.body")
            </div>
            <div class="col-12 mb-4">
                <a class="btn btn-link card-link lc-card-more mt-1 text-decoration-none d-inline-flex gap-2 px-4"
                   data-bs-toggle="modal"
                   data-bs-target="#experience-{{ $experience->id }}">
                    <span class="lc-card-more-dot">&nbsp;</span>
                    <span class="lc-card-more-dot">&nbsp;</span>
                    <span class="lc-card-more-dot">&nbsp;</span>
                </a>
            </div>
        </div>
    </div>
</div>


@push('modals')
    @include('experience.card.modal.index')
@endpush
