<div class="card-body card-body">
    <a href="{{ $experience->company_url }}" target="_blank" class="card-subtitle card-subtitle mb-2 text-decoration-none">
        <i class="bi bi-box-arrow-up-right"></i>
        {{ $experience->company_name }}
    </a>
    <h5 class="card-title card-title m-0">{{ $experience->position }}</h5>
    <div class="card-text card-text m-0">
        {{$experience?->started_at?->year}} - {{ $experience?->ended_at?->year ?? 'now' }}
    </div>
</div>
