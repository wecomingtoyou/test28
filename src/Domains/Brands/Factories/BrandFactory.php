<?php

declare(strict_types=1);

namespace Domains\Brands\Factories;

use Domains\Brands\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

final class BrandFactory extends Factory
{
    protected $model = Brand::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word
        ];
    }
}
