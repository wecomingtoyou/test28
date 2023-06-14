<?php

declare(strict_types=1);

namespace Apps\Api\V1\Controllers\Cars;

use Apps\Api\ApiController;
use Apps\Api\V1\Requests\Cars\CreateRequest;
use Apps\Api\V1\Resources\Cars\CarResource;
use Domains\Cars\Contracts\CarCommand;
use Illuminate\Contracts\Support\Responsable;

final class CreateController extends ApiController
{
    public function __construct(
        private CarCommand $command
    ) {
    }

    public function __invoke(CreateRequest $request): Responsable
    {
        $model = $this->command->create($request->toData());

        return CarResource::make($model);
    }
}
