<?php

namespace ishabanov\Api\Presentation\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use ishabanov\Core\Domain\Enums\Response\Status;

class HealthcheckController extends Controller
{
    public function __invoke(): JsonResponse
    {
        return new JsonResponse([
            'status' => Status::SUCCESS
        ]);
    }
}
