<?php

namespace App\Domains\Homepage\Contracts\Repositories;

use App\Data\Database\Eloquent\Models\Experience;
use App\Data\Database\Eloquent\Models\Tool;
use App\Domains\Homepage\ValueObjects\WorkingExperience;
use App\Foundation\Enums\ToolType;
use Illuminate\Support\Collection;

interface ExperienceRepositoryContract
{
    /**
     * @return Collection<int, Tool>
     */
    public function getTopToolByTypeJob(ToolType $type, int $limit = 3): Collection;

    /**
     * @return Collection<int, Experience>
     */
    public function getListOfExperiencesJob(): Collection;
}
