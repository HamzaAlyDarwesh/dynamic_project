<?php

namespace App\Exceptions;

use App\Traits\ApiResponse;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use \Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    use ApiResponse;

    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * @param $request
     * @param Throwable $exception
     * @return JsonResponse
     * @throws Throwable
     */
    public function render($request, Throwable $exception): JsonResponse
    {
        // not found response
        if ($exception instanceof ModelNotFoundException || $exception instanceof NotFoundHttpException) {
            return $this->notFoundResponse(trans('response.record_not_found'), Response::HTTP_NOT_FOUND, $exception->getMessage());
        }

        //  unauthenticated response
        if ($exception instanceof AuthenticationException) {
            return $this->notFoundResponse(__('response.unauthenticated'), Response::HTTP_UNAUTHORIZED, $exception->getMessage());
        }

        return parent::render($request, $exception);
    }
}
