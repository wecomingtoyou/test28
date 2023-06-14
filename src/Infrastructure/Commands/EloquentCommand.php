<?php

declare(strict_types=1);

namespace Infrastructure\Commands;

use Illuminate\Database\Eloquent\Builder;

abstract class EloquentCommand
{
    public function __construct(
        private Builder $builder
    ) {
    }

    protected function builder(): Builder
    {
        return clone $this->builder;
    }
}
