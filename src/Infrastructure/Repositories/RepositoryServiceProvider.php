<?php

declare(strict_types=1);

namespace Infrastructure\Repositories;

use Domains\Cars\Contracts\CarRepository;
use Domains\Cars\Models\Car;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Repositories\Cars\CarEloquentRepository;
use Spatie\QueryBuilder\QueryBuilder;

final class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            abstract: CarRepository::class,
            concrete: static fn(): CarEloquentRepository =>
                new CarEloquentRepository(
                    builder: QueryBuilder::for(
                        subject: Car::class
                    )
                )
        );
    }
}
