<?php

declare(strict_types=1);

namespace Domains\Cars\Models;

use Domains\Cars\Factories\CarFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Shared\Models\EloquentModel;

final class CarBrand extends EloquentModel
{
    protected $fillable = [
        'name'
    ];

    public function models(): HasMany
    {
        return $this->hasMany(CarModel::class);
    }

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }

    protected static function newFactory(): CarFactory
    {
        return new CarBrand();
    }
}
