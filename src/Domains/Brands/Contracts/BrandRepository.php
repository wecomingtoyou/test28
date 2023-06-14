<?php

declare(strict_types=1);

namespace Domains\Brands\Contracts;

use Illuminate\Contracts\Pagination\Paginator;

interface BrandRepository
{
    public function paginate(int $limit = 10): Paginator;
}
