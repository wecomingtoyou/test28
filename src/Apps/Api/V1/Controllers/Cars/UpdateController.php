<?php

declare(strict_types=1);

namespace Apps\Api\V1\Controllers\Cars;

use Apps\Api\ApiController;
use Apps\Api\V1\Requests\Cars\UpdateRequest;
use Apps\Api\V1\Resources\Cars\CarResource;
use Domains\Cars\Contracts\CarCommand;
use Illuminate\Contracts\Support\Responsable;

final class UpdateController extends ApiController
{
    public function __construct(
        private CarCommand $command
    ) {
    }

    public function __invoke(UpdateRequest $request, int $id): Responsable
    {
        $model = $this->command->update($id, $request->toData());

        return CarResource::make($model);
    }
}
