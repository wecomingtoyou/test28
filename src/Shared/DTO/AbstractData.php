<?php

declare(strict_types=1);

namespace Shared\DTO;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Arr;

abstract class AbstractData implements Arrayable
{
    public function only(string|array $keys): array
    {
        return Arr::only($this->toArray(), $keys);
    }

    public function except(string|array $keys): array
    {
        return Arr::except($this->toArray(), $keys);
    }
}
