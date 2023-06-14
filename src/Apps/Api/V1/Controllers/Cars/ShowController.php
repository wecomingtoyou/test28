<?php

declare(strict_types=1);

namespace Apps\Api\V1\Controllers\Cars;

use Apps\Api\ApiController;
use Apps\Api\V1\Resources\Cars\CarResource;
use Domains\Cars\Contracts\CarRepository;
use Illuminate\Contracts\Support\Responsable;

final class ShowController extends ApiController
{
    public function __construct(
        private CarRepository $repository
    ) {
    }

    public function __invoke(int $id): Responsable
    {
        $model = $this->repository->findByAttribute('id', $id);

        return CarResource::make($model);
    }
}
