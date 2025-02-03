<?php

declare(strict_types=1);

namespace App\Front\Presentation\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

/**
 * @property-read array{"experiences": Collection} $resource
 */
class HomepageResource extends JsonResource
{
    public function __construct(Collection $experiences)
    {
        parent::__construct([
            'experiences' => $experiences,
        ]);
    }

    public function toArray(Request $request): array
    {
        return [
            'years' => Carbon::parse('2015-11-25 00:00:00')->diffInYears(Carbon::now()),
            'experiences' => ExperienceResource::collection($this->resource['experiences']),
        ];
    }
}
