<?php

declare(strict_types=1);

namespace Domains\Models\Models;

use Domains\Brands\Models\Brand;
use Domains\Cars\Models\Car;
use Domains\Models\Factories\ModelFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Shared\Models\EloquentModel;

final class Model extends EloquentModel
{
    protected $fillable = [
        'name', 'brand_id'
    ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }

    protected static function newFactory(): ModelFactory
    {
        return new ModelFactory();
    }
}
