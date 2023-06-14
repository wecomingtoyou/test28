<?php

declare(strict_types=1);

namespace Domains\Cars\Factories;

use Domains\Cars\Models\CarBrand;
use Domains\Cars\Models\CarModel;
use Illuminate\Database\Eloquent\Factories\Factory;

final class CarModelFactory extends Factory
{
    protected $model = CarModel::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'brand_id' => CarBrand::factory()
        ];
    }
}
