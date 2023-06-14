<?php

declare(strict_types=1);

namespace Infrastructure\Repositories\Models;

use Domains\Models\Contracts\ModelRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Infrastructure\Repositories\EloquentRepository;

final class ModelEloquentRepository extends EloquentRepository implements ModelRepository
{
    public function paginate(int $limit = 10): Paginator
    {
        return $this->builder()
            ->with('brand')
            ->paginate($limit);
    }
}
