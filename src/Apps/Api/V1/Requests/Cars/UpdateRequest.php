<?php

declare(strict_types=1);

namespace Apps\Api\V1\Requests\Cars;

use Domains\Cars\DTO\CarData;
use Shared\Http\Requests\AbstractRequest;

final class UpdateRequest extends AbstractRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'vin' => ['sometimes', 'string', sprintf('unique:cars,vin,%s', $this->route('id'))],
            'model_id' => ['sometimes', 'numeric', 'exists:models,id'],
            'color' => ['sometimes', 'string'],
            'mileage' => ['sometimes', 'numeric'],
            'issued' => ['sometimes', 'date'],
        ];
    }

    public function toData(): CarData
    {
        return CarData::make($this->validated());
    }
}
