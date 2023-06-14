<?php

declare(strict_types=1);

namespace Apps\Api\V1\Resources\Cars;

use Apps\Api\V1\Resources\Models\ModelResource;
use Shared\Http\Resources\AbstractResource;

final class CarResource extends AbstractResource
{
    private string $type = 'cars';

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
        return [
            'color' => $this->color,
            'mileage' => $this->mileage,
            'issued' => $this->issued,
            'created_at' => $this->created_at->format(self::TIMESTAMP_FORMAT),
            'updated_at' => $this->updated_at->format(self::TIMESTAMP_FORMAT),
        ];
    }

    protected function getRelations(): array
    {
        return $this->whenLoaded('model', function () {
            return ['model' => ModelResource::make($this->model)];
        });
    }
}
