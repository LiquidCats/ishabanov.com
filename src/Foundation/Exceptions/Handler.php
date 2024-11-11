<?php

declare(strict_types=1);

namespace App\Foundation\Exceptions;

use App\Foundation\Enums\Response\Status;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as BaseExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\UnauthorizedException;
use Illuminate\Validation\ValidationException;
use Psr\Log\LogLevel;
use Throwable;

use function app;
use function env;

class Handler extends BaseExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<Throwable>, LogLevel::*>
     */
    protected $levels = [

    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [

    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(static function (Throwable $e) {
            Log::error($e->getMessage());
            Log::debug($e->getTraceAsString());
        })->stop();

        $this->renderable(static function (Throwable $e, Request $request) {
            if ($request->is('*/api/*')) {
                $response = new JsonResponse;

                $data = [
                    'status' => Status::FAIL,
                    'message' => $e->getMessage(),
                ];
                if (env('APP_DEBUG', false) && ! app()->isProduction()) {
                    $data['trace'] = $e->getTrace();
                }

                $response->setStatusCode(400);

                if ($e instanceof ValidationException) {
                    $data['data'] = $e->validator->getMessageBag()->getMessages();

                    $response->setStatusCode(422);
                }

                if ($e instanceof AuthenticationException) {
                    $response->setStatusCode(401);
                }

                if ($e instanceof UnauthorizedException) {
                    $response->setStatusCode(403);
                }

                if ($e instanceof ModelNotFoundException) {
                    $response->setStatusCode(404);
                }

                return $response->setData($data);
            }
        });
    }
}
