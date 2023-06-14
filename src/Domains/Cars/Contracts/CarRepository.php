<?php

declare(strict_types=1);

namespace Domains\Cars\Contracts;

use Illuminate\Contracts\Pagination\Paginator;

interface CarRepository
{
    public function paginate(int $limit = 10): Paginator;
}
