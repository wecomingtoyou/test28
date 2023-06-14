<?php

declare(strict_types=1);

namespace Infrastructure\Repositories\Brands;

use Domains\Brands\Contracts\BrandRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Infrastructure\Repositories\EloquentRepository;

final class BrandEloquentRepository extends EloquentRepository implements BrandRepository
{
    public function paginate(int $limit = 10): Paginator
    {
        return $this->builder()->paginate($limit);
    }
}
