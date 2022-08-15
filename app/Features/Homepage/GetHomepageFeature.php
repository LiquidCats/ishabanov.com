<?php

namespace App\Features\Homepage;

use App\Data\Models\Experience;
use App\Domains\Experience\Jobs\{CalculateExperienceDurationJob, GetListOfExperiencesJob};
use App\Domains\Experience\ValueObjects\WorkingExperience;
use Illuminate\Support\Collection;
use Lucid\Domains\Http\Jobs\RespondWithViewJob;
use Lucid\Units\Feature;

use function compact;

class GetHomepageFeature extends Feature
{
    public function handle()
    {
        /** @var Collection<int, Experience> $experiences */
        $experiences = $this->run(new GetListOfExperiencesJob());

        /** @var WorkingExperience $duration */
        $duration = $this->run(new CalculateExperienceDurationJob($experiences->last()));

        return $this->run(
            new RespondWithViewJob(
                'index',
                compact('duration', 'experiences')
            )
        );
    }
}
