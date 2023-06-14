<?php

declare(strict_types=1);

namespace Infrastructure\Repositories;

use Spatie\QueryBuilder\QueryBuilder;

abstract class EloquentRepository
{
    public function __construct(
        private QueryBuilder $builder
    ) {
    }

    protected function builder(): QueryBuilder
    {
        return clone $this->builder;
    }
}
