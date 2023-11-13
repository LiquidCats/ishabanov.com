@php /** @var Illuminate\Support\Collection<int, App\Data\Database\Eloquent\Models\Experience> $experiences */ @endphp
<section id="experience" class="d-flex experience position-relative shadow">
    <div class="col-2 d-none d-md-block" style="background-color: #F5F5F5">
        <div id="experience-years" class="experience-timeline sticky-top min-vh-100 d-flex flex-column align-items-center justify-content-center">
        @foreach($experiences as $experience)
            <a href="#experience-{{ $experience?->started_at?->year }}" class="experience-timeline__year fs-3 fw-bold">{{ $experience?->started_at?->year }}</a>
        @endforeach
        </div>
    </div>
    <div id="experience-descriptions" class="experience-descriptions col" tabindex="0">
    @foreach($experiences as $experience)
        <div id="experience-{{ $experience?->started_at?->year }}"
             class="experience-description min-vh-100 text-white d-flex justify-content-center align-items-center overflow-hidden">
            <div class="p-3" data-animation="squeeze-out">
                <div class="experience-description__image d-flex justify-content-start align-items-center bg-white mb-4 p-3">
                    <img class="d-block mx-auto img-fluid" src="{{ asset($experience->company_logo) }}"
                         alt="{{ $experience->company_name }}">
                </div>
                <div class="experience-description__content">
                    <div class="experience-description__content__company fs-5 fw-light">
                        <a href="{{ $experience->company_url }}"
                           target="_blank"
                           class="text-white text-decoration-none"><i class="bi bi-link-45deg"></i> {{ $experience->company_name }}</a>
                    </div>
                    <h2 class="experience-description__content__position fw-bold mb-0">{{ $experience->position }}</h2>
                    <div class="experience-description__content__years fs-5 fw-light">{{ $experience?->started_at?->year }} - {{ $experience?->ended_at?->year ?? 'now' }}</div>
                    <div class="experience-description__content__tools mb-3 mt-3">
                        @foreach($experience->tools as $tool)
                            <span class="badge bg-light text-black fw-normal fs-6 mb-1">{{ $tool->name }}: {{ $tool?->pivot?->level_id?->getText() }}</span>
                        @endforeach
                    </div>
                    <div class="experience-description__content__description fs-6">
                        <p>{{ $experience->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    </div>

</section>
