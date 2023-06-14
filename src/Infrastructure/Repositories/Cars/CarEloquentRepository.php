<?php

declare(strict_types=1);

namespace Infrastructure\Repositories\Cars;

use Domains\Cars\Contracts\CarRepository;
use Domains\Cars\Models\Car;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Infrastructure\Repositories\EloquentRepository;

final class CarEloquentRepository extends EloquentRepository implements CarRepository
{
    /**
     * @param string $atrribute
     * @param mixed $value
     * @return Car
     * @throws ModelNotFoundException
     */
    public function findByAttribute(string $atrribute, mixed $value): Car
    {
        return $this->builder()
            ->with(['model', 'model.brand'])
            ->where($atrribute, $value)
            ->firstOrFail();
    }

    public function paginate(int $limit = 10): Paginator
    {
        return $this->builder()
            ->with(['model', 'model.brand'])
            ->paginate($limit);
    }
}
