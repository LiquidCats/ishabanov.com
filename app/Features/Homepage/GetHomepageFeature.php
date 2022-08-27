<?php

declare(strict_types=1);

namespace App\Features\Homepage;

use App\Data\Enums\ToolType;
use App\Data\Models\{Experience, Tool};
use App\Domains\Experience\Jobs\{CalculateExperienceDurationJob, GetListOfExperiencesJob, GetTopToolByTypeJob};
use App\Domains\Experience\ValueObjects\WorkingExperience;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Lucid\Domains\Http\Jobs\RespondWithViewJob;
use Lucid\Units\Feature;

class GetHomepageFeature extends Feature
{
    public function handle(): Response
    {
        /** @var Collection<int, Tool> $languages */
        $languages = $this->run(new GetTopToolByTypeJob(ToolType::LANGUAGE, 4));

        /** @var Collection<int, Tool> $frameworks */
        $frameworks = $this->run(new GetTopToolByTypeJob(ToolType::FRAMEWORK));

        /** @var Collection<int, Experience> $experiences */
        $experiences = $this->run(new GetListOfExperiencesJob());

        /** @var WorkingExperience $duration */
        $duration = $this->run(new CalculateExperienceDurationJob($experiences->last()));

        return $this->run(
            new RespondWithViewJob(
                'index',
                [
                    'duration' => $duration,
                    'experiences' => $experiences,
                    'languages' => $languages,
                    'frameworks' => $frameworks,
                ]
            )
        );
    }
}
