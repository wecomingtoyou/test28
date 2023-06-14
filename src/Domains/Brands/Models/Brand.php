<?php

declare(strict_types=1);

namespace Domains\Brands\Models;

use Domains\Brands\Factories\BrandFactory;
use Domains\Models\Models\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Shared\Models\EloquentModel;

final class Brand extends EloquentModel
{
    protected $fillable = [
        'name'
    ];

    public function models(): HasMany
    {
        return $this->hasMany(Model::class);
    }

    protected static function newFactory(): BrandFactory
    {
        return new BrandFactory();
    }
}
