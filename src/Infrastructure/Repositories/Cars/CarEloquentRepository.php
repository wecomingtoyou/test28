<?php

declare(strict_types=1);

namespace Infrastructure\Repositories\Cars;

use Domains\Cars\Contracts\CarRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Infrastructure\Repositories\EloquentRepository;

final class CarEloquentRepository extends EloquentRepository implements CarRepository
{
    public function paginate(int $limit = 10): Paginator
    {
        return $this->builder()
            ->with(['model', 'model.brand'])
            ->paginate($limit);
    }
}
