<?php

declare(strict_types=1);

namespace Domains\Cars\Contracts;

use Domains\Cars\DTO\NewCarData;
use Domains\Cars\Models\Car;

interface CarCommand
{
    public function create(NewCarData $data): Car;
    public function delete(int $id): bool;
}
