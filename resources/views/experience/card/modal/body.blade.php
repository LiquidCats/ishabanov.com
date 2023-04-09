<div class="modal-body">
    <div class="row">
        <div class="col-12 text-end">
            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    data-bs-target="#experience-{{ $experience->id }}"
                    aria-label="Close"></button>
        </div>

        <div class="col-12 text-center">
            <img src="{{ asset($experience->company_logo) }}" class="d-block img-fluid mx-auto"
                 alt="{{ $experience->company_name }}">

            <div class="text-muted fs-3 m-0">
                {{ $experience?->started_at?->year }} - {{ $experience?->ended_at?->year ?? 'now' }}
            </div>

            <a href="{{ $experience->company_url }}" target="_blank" class="fs-4 link-secondary text-decoration-none mb-2">
                <i data-feather="external-link"
                   stroke-width="1.5"
                   width="24"
                   height="24"></i>
                {{ $experience->company_name }}
            </a>

            <div class="display-6 m-4 fw-semibold">{{ $experience->position }}</div>
            <div>
                @foreach($experience->tools as $tool)
                    <span class="badge bg-light text-dark fw-normal fs-6 mb-1">{{ $tool->name }}: {{ $tool?->pivot?->level_id?->getText() }}</span>
                @endforeach
            </div>
        </div>

        <div class="col-12">
            <div class="fs-5 m-2 px-2">
                {{ $experience->description }}
            </div>
        </div>
    </div>
</div>
