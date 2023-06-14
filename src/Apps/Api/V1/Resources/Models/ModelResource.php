<?php

declare(strict_types=1);

namespace Apps\Api\V1\Resources\Models;

use Apps\Api\V1\Resources\Brands\BrandResource;
use Shared\Http\Resources\AbstractResource;

final class ModelResource extends AbstractResource
{
    private string $type = 'models';

    protected function getId(): string
    {
        return (string) $this->id;
    }

    protected function getType(): string
    {
        return $this->type;
    }

    protected function getAttributes(): array
    {
        return ['name' => $this->name];
    }

    protected function getRelations(): array
    {
        return $this->whenLoaded('brand', function () {
            return ['brand' => BrandResource::make($this->brand)];
        });
    }
}
