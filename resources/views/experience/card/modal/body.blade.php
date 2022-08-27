<div class="modal-body">

    <div class="row">
        <div class="col-12 text-end">
            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    data-bs-target="#experience-{{ $experience->id }}"
                    aria-label="Close"></button>
        </div>

        <div class="col-12 justify-content-center text-center">
            <img src="{{ asset($experience->company_logo) }}" class="d-block mx-auto"
                 alt="{{ $experience->company_name }}">

            <a href="{{ $experience->company_url }}" target="_blank" class="fs-4 link-secondary text-decoration-none mb-2">
                {{ $experience->company_name }}
            </a>

            <div class="display-6 m-0">{{ $experience->position }}</div>

            <div class="text-muted fs-3 m-0">
                {{ $experience?->started_at?->year }} - {{ $experience?->ended_at?->year ?? 'now' }}
            </div>
        </div>

        <div class="col-12 text-center">
            <div class="fs-5 mt-2 mb-4 text-lg-start">
                {{ $experience->description }}
            </div>
        </div>
    </div>

</div>
