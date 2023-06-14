<?php

declare(strict_types=1);

namespace Domains\Cars\Contracts;

interface CarCommand
{
    public function delete(int $id): bool;
}
