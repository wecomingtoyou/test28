<?php

declare(strict_types=1);

namespace Apps\Api\V1\Controllers\Cars;

use Apps\Api\ApiController;
use Domains\Cars\Contracts\CarCommand;
use Illuminate\Contracts\Support\Responsable;
use Symfony\Component\HttpFoundation\Response;

final class DeleteController extends ApiController
{
    public function __construct(
        private CarCommand $command
    ) {
    }

    public function __invoke(int $id): Responsable
    {
        if (! $this->command->delete($id)) {
            return $this->errorResponse(
                message: sprintf('couldn\'t delete the model [%s]!', $id),
            );
        }

        return $this->successResponse(
            data: [],
            code: Response::HTTP_NO_CONTENT
        );
    }
}
