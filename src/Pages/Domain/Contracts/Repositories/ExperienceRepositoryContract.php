<?php

namespace ishabanov\Pages\Domain\Contracts\Repositories;

use Illuminate\Support\Collection;
use ishabanov\Core\Domain\Enums\ToolType;
use ishabanov\Core\Infrastructure\Eloquent\Models\Experience;
use ishabanov\Core\Infrastructure\Eloquent\Models\Tool;
use ishabanov\Pages\Domain\ValueObjects\WorkingExperience;

interface ExperienceRepositoryContract
{
    /**
     * @param ToolType $type
     * @param int      $limit
     *
     * @return Collection<int, Tool>
     */
    public function getTopToolByTypeJob(ToolType $type, int $limit = 3): Collection;

    /**
     * @return Collection<int, Experience>
     */
    public function getListOfExperiencesJob(): Collection;

    public function calculateExperienceDurationJob(Experience $experience): WorkingExperience;
}
