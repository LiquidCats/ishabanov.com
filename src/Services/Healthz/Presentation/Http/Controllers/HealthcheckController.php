<?php

namespace App\Services\Healthz\Presentation\Http\Controllers;

use App\Foundation\Enums\Response\Status;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class HealthcheckController extends Controller
{
    public function __invoke(): JsonResponse
    {
        return new JsonResponse([
            'status' => Status::SUCCESS,
        ]);
    }
}
