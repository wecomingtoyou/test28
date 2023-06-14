<?php

namespace Database\Seeders;

use Domains\Cars\Models\Car;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Car::factory(50)->create();
    }
}
