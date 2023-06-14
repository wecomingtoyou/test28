<?php

declare(strict_types=1);

namespace Domains\Cars\Contracts;

use Domains\Cars\DTO\CarData;
use Domains\Cars\Models\Car;

interface CarCommand
{
    public function create(CarData $data): Car;
    public function update(int $id, CarData $data): Car;
    public function delete(int $id): bool;
}
