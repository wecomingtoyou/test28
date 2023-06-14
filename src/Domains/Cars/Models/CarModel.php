<?php

declare(strict_types=1);

namespace Domains\Cars\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Shared\Models\EloquentModel;

final class CarModel extends EloquentModel
{
    protected $fillable = [
        'name', 'brand_id'
    ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(CarBrand::class);
    }

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }

    protected static function newFactory(): array
    {
        return new CarModel();
    }
}
