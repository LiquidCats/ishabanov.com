<?php

declare(strict_types=1);

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Psr\Log\LogLevel;
use Throwable;

class Handler extends ExceptionHandler
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
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register(): void
    {
        $this->reportable(static function(Throwable $e) {})->stop();

        $this->renderable(static function (Throwable $e, Request $request) {
            if ($request->is('api/*')) {
                $response = new JsonResponse();

                $data = [
                    'ok' => false,
                    'message' => $e->getMessage(),
                ];

                $response->setStatusCode(400);

                if ($e instanceof ValidationException) {
                    $data['validation'] = $e->validator->getMessageBag()->getMessages();

                    $response->setStatusCode(422);
                }

                return $response->setData($data);
            }
        });
    }
}
