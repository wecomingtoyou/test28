<?php

declare(strict_types=1);

namespace Apps\Api;

use Illuminate\Contracts\Support\Responsable;
use Shared\Http\Controllers\Controller;
use Shared\Http\Responses\ApiErrorResponse;
use Shared\Http\Responses\ApiMessageResponse;
use Shared\Http\Responses\ApiSuccessResponse;
use Symfony\Component\HttpFoundation\Response;

abstract class ApiController extends Controller
{
    protected function perPage(): int
    {
        $limit = (int) request()->get('per_page', 10);

        return $limit > 100 ? 10 : $limit;
    }

    protected function successResponse(
        array $data,
        array $metadata = [],
        int $code = Response::HTTP_OK,
        array $headers = []
    ): Responsable {
        return new ApiSuccessResponse(
            data: $data,
            metadata: $metadata,
            code: $code,
            headers: $headers
        );
    }

    protected function errorResponse(
        string $message,
        ?Throwable $exception = null,
        int $code = Response::HTTP_INTERNAL_SERVER_ERROR,
        array $headers = []
    ): Responsable {
        return new ApiErrorResponse(
            message: $message,
            exception: $exception,
            code: $code,
            headers: $headers,
        );
    }

    protected function messageResponse(
        string $message,
        int $code = Response::HTTP_OK,
        array $headers = []
    ): Responsable {
        return new ApiMessageResponse(
            message: $message,
            code: $code,
            headers: $headers,
        );
    }
}
