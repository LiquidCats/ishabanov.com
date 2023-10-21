<?php

namespace App\Data\Database\Eloquent\Repositories;

use App\Data\Database\Eloquent\Models\Experience;
use App\Data\Database\Eloquent\Models\Tool;
use App\Domains\Homepage\Contracts\Repositories\ExperienceRepositoryContract;
use App\Domains\Homepage\ValueObjects\WorkingExperience;
use App\Foundation\Enums\ToolType;
use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;

class ExperienceRepository implements ExperienceRepositoryContract
{
    /**
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
            ->get();
    }
}
