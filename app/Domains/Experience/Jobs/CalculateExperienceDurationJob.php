<?php

declare(strict_types=1);

namespace App\Domains\Experience\Jobs;

use App\Data\Models\Experience;
use App\Domains\Experience\ValueObjects\WorkingExperience;
use Carbon\CarbonImmutable;
use Lucid\Units\Job;

/**
 * Class CalculateExperienceDurationJob.
 */
class CalculateExperienceDurationJob extends Job
{
    public function __construct(protected Experience $experience)
    {
    }

    public function handle(): WorkingExperience
    {
        $beginning = $this->experience->started_at;
        $now = CarbonImmutable::now();

        $durationInYears = $now->diffInYears($beginning);

        $durationInMonth = (int) $now->diffInMonths($beginning) - $durationInYears * 12;

        return new WorkingExperience($durationInYears, $durationInMonth);
    }
}
