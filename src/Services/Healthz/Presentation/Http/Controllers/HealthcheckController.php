<?php

namespace App\Services\Healthz\Presentation\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use App\Foundation\Enums\Response\Status;

class HealthcheckController extends Controller
{
    public function __invoke(): JsonResponse
    {
        return new JsonResponse([
            'status' => Status::SUCCESS,
        ]);
    }
}
