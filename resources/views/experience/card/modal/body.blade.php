<div class="modal-body">

    <div class="row">
        <div class="col-12 text-end">
            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    data-bs-target="#experience-{{ $experience->id }}"
                    aria-label="Close"></button>
        </div>

        <div class="col-12 justify-content-center">
            <img src="{{ asset($experience->company_logo) }}" class="d-block mx-auto"
                 alt="{{ $experience->company_name }}">
        </div>

        <div class="col-12 text-center">
            <a href="{{ $experience->company_url }}" target="_blank" class="fs-4 link-secondary text-decoration-none mb-2">
                {{ $experience->company_name }}
            </a>

            <div class="display-6 m-0">{{ $experience->position }}</div>

            <div class="text-muted fs-3 m-0">
                {{$experience?->started_at?->year}} - {{ $experience?->ended_at?->year ?? 'now' }}
            </div>

            <div class="fs-5 mt-2 mb-4">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci at blanditiis, consequuntur culpa cupiditate error illo, incidunt necessitatibus nostrum perferendis quia similique tempora unde ut velit voluptate voluptates! Maxime, provident.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias aperiam aspernatur autem cupiditate eaque eligendi enim eos fugit harum hic illo inventore minus molestias nulla reiciendis, repellat sit suscipit.</p>
            </div>
        </div>
    </div>

</div>
