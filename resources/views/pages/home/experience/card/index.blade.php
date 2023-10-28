<div class="col-12 col-md-6 col-lg-4">
    <div class="card text-center p-2 rounded-4">
        <div class="row g-0">
            <div class="col-12 align-self-center p-4 p-lg-2">
                <img src="{{ asset($experience->company_logo) }}" class="d-block mx-auto"
                     alt="{{ $experience->company_name }}">
            </div>
            <div class="col-12-auto mx-auto">
                @include("pages.home.experience.card.body")
            </div>
            <div class="col-12 mb-4">
                <a class="btn card-more mt-1 d-inline-flex gap-2 px-4"
                   data-bs-toggle="modal"
                   data-bs-target="#experience-{{ $experience->id }}">
                    <span class="card-more-dot">&nbsp;</span>
                    <span class="card-more-dot">&nbsp;</span>
                    <span class="card-more-dot">&nbsp;</span>
                </a>
            </div>
        </div>
    </div>
</div>


@push('modals')
    @include('pages.home.experience.card.modal.index')
@endpush
