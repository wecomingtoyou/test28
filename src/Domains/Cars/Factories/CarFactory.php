<?php

declare(strict_types=1);

namespace Domains\Cars\Factories;

use Domains\Cars\Models\Car;
use Domains\Models\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

final class CarFactory extends Factory
{
    protected $model = Car::class;

    public function definition(): array
    {
        return [
            'mileage' => $this->faker->numberBetween(1000, 100000),
            'color' => $this->faker->colorName,
            'issued' => $this->faker->dateTime->format('Y-m-d'),
            'model_id' => Model::factory(),
        ];
    }
}
