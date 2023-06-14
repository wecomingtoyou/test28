<?php

declare(strict_types=1);

namespace Apps\Api\V1\Requests\Cars;

use Domains\Cars\DTO\NewCarData;
use Shared\Http\Requests\AbstractRequest;

final class CreateRequest extends AbstractRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'vin' => ['required', 'string', 'unique:cars,vin'],
            'model_id' => ['required', 'numeric', 'exists:models,id'],
            'color' => ['sometimes', 'string'],
            'mileage' => ['sometimes', 'numeric'],
            'issued' => ['sometimes', 'date'],
        ];
    }

    public function toData(): NewCarData
    {
        return NewCarData::make($this->validated());
    }
}
