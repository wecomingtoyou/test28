<?php

declare(strict_types=1);

namespace Domains\Cars\Models;

use Domains\Brands\Models\Brand;
use Domains\Cars\Factories\CarFactory;
use Domains\Models\Models\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Shared\Models\EloquentModel;

final class Car extends EloquentModel
{
    protected $fillable = [
        'mileage', 'color', 'issued_at',
    ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function model(): BelongsTo
    {
        return $this->belongsTo(Model::class);
    }

    protected static function newFactory(): CarFactory
    {
        return new CarFactory();
    }
}
