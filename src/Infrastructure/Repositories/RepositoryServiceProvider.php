<?php

declare(strict_types=1);

namespace Infrastructure\Repositories;

use Domains\Brands\Contracts\BrandRepository;
use Domains\Brands\Models\Brand;
use Domains\Cars\Contracts\CarRepository;
use Domains\Cars\Models\Car;
use Domains\Models\Contracts\ModelRepository;
use Domains\Models\Models\Model;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Repositories\Brands\BrandEloquentRepository;
use Infrastructure\Repositories\Cars\CarEloquentRepository;
use Infrastructure\Repositories\Models\ModelEloquentRepository;
use Spatie\QueryBuilder\QueryBuilder;

final class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            abstract: BrandRepository::class,
            concrete: static fn(): BrandEloquentRepository =>
                new BrandEloquentRepository(
                    builder: QueryBuilder::for(
                        subject: Brand::class
                    )
                )
        );

        $this->app->bind(
            abstract: ModelRepository::class,
            concrete: static fn(): ModelEloquentRepository =>
            new ModelEloquentRepository(
                builder: QueryBuilder::for(
                    subject: Model::class
                )
            )
        );

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
