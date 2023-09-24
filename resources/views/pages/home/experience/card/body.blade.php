<div class="card-body lc-card-body">
    <a href="{{ $experience->company_url }}" target="_blank" class="card-subtitle lc-card-subtitle mb-2 text-decoration-none">
        <i data-feather="external-link"
           stroke-width="1.5"
           width="24"
           height="24"></i>
        {{ $experience->company_name }}
    </a>
    <h5 class="card-title lc-card-title m-0">{{ $experience->position }}</h5>
    <div class="card-text lc-card-text m-0">
        {{$experience?->started_at?->year}} - {{ $experience?->ended_at?->year ?? 'now' }}
    </div>
</div>
