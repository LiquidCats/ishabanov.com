<?php

declare(strict_types=1);

namespace App\Domains\Experience\Jobs;

use App\Data\Models\Experience;
use Illuminate\Support\Collection;
use Lucid\Units\Job;

/**
 * Class GetListOfExperiencesJob.
 */
class GetListOfExperiencesJob extends Job
{
    /**
     * @return Collection<int, Collection>
     */
    public function handle(): Collection
    {
        /* @var Collection<int, Experience> $experiences */
        return Experience::query()
            ->with(['tools'])
            ->orderByDesc('started_at')
            //->take(6)
            ->get();
    }
}
