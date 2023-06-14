<?php

declare(strict_types=1);

namespace Domains\Cars\Factories;

use Domains\Cars\Models\CarBrand;
use Illuminate\Database\Eloquent\Factories\Factory;

final class CarBrandFactory extends Factory
{
    protected $model = CarBrand::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word
        ];
    }
}
