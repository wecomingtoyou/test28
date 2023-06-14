<?php

declare(strict_types=1);

namespace Apps\Api\V1\Requests\Cars;

use Shared\Http\Requests\AbstractRequest;

final class UpdateRequest extends AbstractRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // TODO: Implement rules() method.
    }
}
