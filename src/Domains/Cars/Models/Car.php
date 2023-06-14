<?php

declare(strict_types=1);

namespace Domains\Cars\Models;

use Domains\Cars\Factories\CarFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Shared\Models\EloquentModel;

final class Car extends EloquentModel
{
    protected $fillable = [
        'mileage', 'color', 'issued_at',
    ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(CarBrand::class);
    }

    public function model(): BelongsTo
    {
        return $this->belongsTo(CarModel::class);
    }

    protected static function newFactory(): CarFactory
    {
        return new CarFactory();
    }
}
