<?php

declare(strict_types=1);

namespace Apps\Api\V1\Controllers\Brands;

use Apps\Api\ApiController;
use Apps\Api\V1\Resources\Brands\BrandResource;
use Domains\Brands\Contracts\BrandRepository;
use Illuminate\Contracts\Support\Responsable;

final class IndexController extends ApiController
{
    public function __construct(
        private BrandRepository $repository
    ) {
    }

    public function __invoke(): Responsable
    {
        return BrandResource::collection(
            resource: $this->repository->paginate(
                limit: $this->perPage()
            )
        );
    }
}
