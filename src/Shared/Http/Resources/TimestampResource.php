<?php

declare(strict_types=1);

namespace Shared\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

final class TimestampResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'created_at' => $this->created_at->format('Y.m.d H:i:s'),
            'updated_at' => $this->updated_at->format('Y.m.d H:i:s'),
            'human_created_at' => $this->created_at->diffForHumans(),
            'human_updated_at' => $this->updated_at->diffForHumans(),
        ];
    }
}
