<?php

declare(strict_types=1);

namespace Infrastructure\Commands;

use Domains\Cars\Contracts\CarCommand;
use Domains\Cars\Models\Car;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Commands\Cars\CarEloquentCommand;

final class CommandServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            abstract: CarCommand::class,
            concrete: static fn(): CarEloquentCommand =>
                new CarEloquentCommand(builder: Car::query())
        );
    }
}
