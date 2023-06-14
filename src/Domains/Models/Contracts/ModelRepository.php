<?php

declare(strict_types=1);

namespace Domains\Models\Contracts;

use Illuminate\Contracts\Pagination\Paginator;

interface ModelRepository
{
    public function paginate(int $limit = 10): Paginator;
}
