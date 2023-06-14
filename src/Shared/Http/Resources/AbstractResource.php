<?php

declare(strict_types=1);

namespace Shared\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

abstract class AbstractResource extends JsonResource
{
    const TIMESTAMP_FORMAT = 'Y-m-d H:i:s';

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

        if (! empty($this->getRelations())) {
            $data['relations'] = $this->getRelations();
        }

        return $data;
    }
}
