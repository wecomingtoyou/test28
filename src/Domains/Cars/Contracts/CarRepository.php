<?php

declare(strict_types=1);

namespace Domains\Cars\Contracts;

use Domains\Cars\Models\Car;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

interface CarRepository
{
    /**
     * @param string $atrribute
     * @param mixed $value
     * @return Car
     * @throws ModelNotFoundException
     */
    public function findByAttribute(string $atrribute, mixed $value): Car;
    public function paginate(int $limit = 10): Paginator;
}
