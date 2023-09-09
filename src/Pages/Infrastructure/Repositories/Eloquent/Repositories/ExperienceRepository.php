<?php

namespace ishabanov\Pages\Infrastructure\Repositories\Eloquent\Repositories;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use ishabanov\Core\Domain\Enums\ToolType;
use ishabanov\Core\Infrastructure\Eloquent\Models\Experience;
use ishabanov\Core\Infrastructure\Eloquent\Models\Tool;
use ishabanov\Pages\Domain\Contracts\Repositories\ExperienceRepositoryContract;
use ishabanov\Pages\Domain\ValueObjects\WorkingExperience;

class ExperienceRepository implements ExperienceRepositoryContract
{
    /**
     * @param ToolType $type
     * @param int      $limit
     *
     * @return Collection<int, Tool>
     */
    public function getTopToolByTypeJob(ToolType $type, int $limit = 3): Collection
    {
        return Tool::query()
            ->take($limit)
            ->where('type', $type)
            ->orderBy('type')
            ->orderByDesc('level')
            ->get();
    }

    /**
     * @return Collection<int, Experience>
     */
    public function getListOfExperiencesJob(): Collection
    {
        return Experience::query()
            ->with(['tools'])
            ->orderByDesc('started_at')
            //->take(6)
            ->get();
    }

    public function calculateExperienceDurationJob(Experience $experience): WorkingExperience
    {
        $beginning = $experience->started_at;
        $now = CarbonImmutable::now();

        $durationInYears = $now->diffInYears($beginning);

        $durationInMonth = (int) $now->diffInMonths($beginning) - $durationInYears * 12;

        return new WorkingExperience($durationInYears, $durationInMonth);
    }
}
