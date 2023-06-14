<?php

declare(strict_types=1);

namespace Shared\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Symfony\Component\HttpFoundation\Response;

final class ApiSuccessResponse implements Responsable
{
    public function __construct(
        public readonly mixed $data,
        public readonly array $metadata,
        public readonly int $code = Response::HTTP_OK,
        public readonly array $headers = [],
    ) {
    }

    public function toResponse($request): Response
    {
        return \response()->json(
            data: [
                'data' => $this->data,
                'metadata' => $this->metadata,
            ],
            status: $this->code,
            headers:  $this->headers
        );
    }
}
