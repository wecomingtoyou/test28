<?php

declare(strict_types=1);

namespace Shared\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

final class ApiErrorResponse implements Responsable
{
    public function __construct(
        public readonly string $message,
        public readonly ?Throwable $exception = null,
        public readonly int $code = Response::HTTP_INTERNAL_SERVER_ERROR,
        public readonly array $headers = []
    ) {
    }

    public function toResponse($request): Response
    {
        $response = ['message' => $this->message];

        if (! is_null($this->exception) && config('app.debug')) {
            $response['debug'] = [
                'message' => $this->exception->getMessage(),
                'file'    => $this->exception->getFile(),
                'line'    => $this->exception->getLine(),
                'trace'   => $this->exception->getTraceAsString()
            ];
        }

        return \response()->json(
            data: $response,
            status: $this->code,
            headers: $this->headers
        );
    }
}
