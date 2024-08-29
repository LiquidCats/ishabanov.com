<?php

declare(strict_types=1);

namespace App\Front\Presentation\Http\Controllers;

use App\Front\Application\Services\PostService;
use App\Front\Presentation\Http\Resources\HomepageResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;

class HomepageController extends Controller
{
    public function __construct(
        private readonly PostService $service,
    ) {
    }

    public function __invoke(): JsonResource
    {
        $experiences = $this->service->getExperiences();
        return new HomepageResource($experiences);
    }
}
