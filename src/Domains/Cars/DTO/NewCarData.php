<?php

declare(strict_types=1);

namespace Domains\Cars\DTO;

use Illuminate\Support\Str;
use Shared\DTO\AbstractData;

final class NewCarData extends AbstractData
{
    private null|string $color = null;
    private null|int $mileage = null;
    private null|string $issued = null;

    public static function make(array $payload): self
    {
        $static = new self(
            vin: $payload['vin'] ?? Str::random(),
            modelId: (int) $payload['model_id']
        );

        $static->color = $payload['color'] ?? null;
        $static->mileage = $payload['mileage'] ?? null;
        $static->issued = $payload['issued'] ?? null;

        return $static;
    }

    public function __construct(
        public readonly string $vin,
        public readonly int $modelId
    ) {
    }

    public function toArray(): array
    {
        return [
            'vin' => $this->vin,
            'model_id' => $this->modelId,
            'color' => $this->color,
            'mileage' => $this->mileage,
            'issued' => $this->issued,
        ];
    }
}
