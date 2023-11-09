@php /** @var Illuminate\Support\Collection<int, App\Data\Database\Eloquent\Models\Experience> $experiences */ @endphp
<section id="experience" class="d-flex experience position-relative shadow">
    <div class="col-2 d-none d-md-block" style="background-color: #F5F5F5">
        <div id="experience-years"
             class="sticky-top min-vh-100 d-flex flex-column align-items-center justify-content-center">
            @foreach($experiences as $experience)
                <a href="#experience-{{ $experience?->started_at?->year }}" class="fs-3 fw-bold experience-year">{{ $experience?->started_at?->year }}</a>
            @endforeach
        </div>

    </div>
    <div id="experience-descriptions" class="col" tabindex="0">
    @foreach($experiences as $experience)
        <div id="experience-{{ $experience?->started_at?->year }}"
             class="min-vh-100 text-white experience-description d-flex justify-content-center align-items-center px-3">
            <div class="py-5">
                <div
                    class="mx-auto experience-description__image d-flex justify-content-center align-items-center bg-white mb-4">
                    <img class="d-block mx-auto" src="{{ asset($experience->company_logo) }}"
                         alt="hemmersbach">
                </div>
                <div class="experience-description__content text-center">
                    <div class="fs-5 fw-light">{{ $experience?->started_at?->year }} - {{ $experience?->ended_at?->year ?? 'now' }}</div>
                    <div class="fs-5 fw-light">
                        <a href="{{ $experience->company_url }}"
                           target="_blank"
                           class="text-white text-decoration-none"><i class="bi bi-link-45deg"></i> {{ $experience->company_name }}</a>
                    </div>
                    <h2 class="fw-bold mb-3">{{ $experience->position }}</h2>
                    <div class="mb-3">
                        @foreach($experience->tools as $tool)
                            <span class="badge bg-light text-black fw-normal fs-6 mb-1">{{ $tool->name }}: {{ $tool?->pivot?->level_id?->getText() }}</span>
                        @endforeach
                    </div>
                    <div class="fs-6">
                        <p>{{ $experience->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    </div>

</section>
