<?php

declare(strict_types=1);

namespace Domains\Cars\Contracts;

use Illuminate\Support\Collection;

interface CarRepository
{
    public function brands(): Collection;
}
