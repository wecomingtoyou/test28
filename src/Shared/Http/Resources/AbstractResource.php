<?php

declare(strict_types=1);

namespace Shared\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

abstract class AbstractResource extends JsonResource
{
    abstract protected function getId(): string; // потомучто может быть uuid
    abstract protected function getType(): string;
    abstract protected function getAttributes(): array;
    abstract protected function getRelations(): array;

    public function toArray(Request $request): array
    {
        $data = [
            'id' => $this->getId(),
            'type' => $this->getType(),
            'attributes' => $this->getAttributes(),
        ];

        if (isset($this->created_at) && isset($this->updated_at)) {
            $data['timestamps'] = TimestampResource::make($this);
        }

        if (! empty($this->getRelations())) {
            $data['relations'] = $this->getRelations();
        }

        return $data;
    }
}
