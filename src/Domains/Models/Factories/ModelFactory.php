<?php

declare(strict_types=1);

namespace Domains\Models\Factories;

use Domains\Brands\Models\Brand;
use Domains\Models\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

final class ModelFactory extends Factory
{
    protected $model = Model::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'brand_id' => Brand::factory()
        ];
    }
}
