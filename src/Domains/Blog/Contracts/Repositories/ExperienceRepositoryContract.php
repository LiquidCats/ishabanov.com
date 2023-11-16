<?php

namespace App\Domains\Blog\Contracts\Repositories;

use App\Data\Database\Eloquent\Models\ExperienceModel;
use App\Data\Database\Eloquent\Models\ToolModel;
use App\Domains\Pages\ValueObjects\WorkingExperience;
use App\Foundation\Enums\ToolType;
use Illuminate\Support\Collection;

interface ExperienceRepositoryContract
{
    /**
     * @return Collection<int, ToolModel>
     */
    public function getTopToolByTypeJob(ToolType $type, int $limit = 3): Collection;

    /**
     * @return Collection<int, ExperienceModel>
     */
    public function getListOfExperiencesJob(): Collection;
}
