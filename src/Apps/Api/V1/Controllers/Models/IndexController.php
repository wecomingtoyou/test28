<?php

declare(strict_types=1);

namespace Apps\Api\V1\Controllers\Models;

use Apps\Api\ApiController;
use Apps\Api\V1\Resources\Models\ModelResource;
use Domains\Models\Contracts\ModelRepository;
use Illuminate\Contracts\Support\Responsable;

final class IndexController extends ApiController
{
    public function __construct(
        private ModelRepository $repository
    ) {
    }

    public function __invoke(): Responsable
    {
        return ModelResource::collection(
           resource: $this->repository->paginate(
               limit: $this->perPage(),
            )
        );
    }
}
