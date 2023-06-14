<?php

namespace Shared\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Shared\Http\Responses\ApiErrorResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class Handler extends ExceptionHandler
{
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

    public function render($request, Throwable $e)
    {
        if ( $e instanceof ModelNotFoundException) {
            $response = new ApiErrorResponse(
                message: $e->getMessage(),
                exception: $e,
                code: Response::HTTP_NOT_FOUND
            );

            return $response->toResponse($request);
        }

        return parent::render($request, $e);
    }
}
