<?php

declare(strict_types=1);

namespace Shared\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

final class ApiMessageResponse implements Responsable
{
    public function __construct(
        public readonly string $message,
        public readonly int $code = Response::HTTP_OK,
        public readonly array $headers = []
    ) {
    }

    public function toResponse($request): Response
    {
        return \response()->json(
            data: ['message' => $this->message],
            status: $this->code,
            headers: $this->headers
        );
    }
}
