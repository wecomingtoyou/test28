<?php

declare(strict_types=1);

namespace Apps\Api\V1\Resources\Brands;

use Shared\Http\Resources\AbstractResource;

final class BrandResource extends AbstractResource
{
    private string $type = 'brands';

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
        return [];
    }
}
