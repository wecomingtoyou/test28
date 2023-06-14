<?php

declare(strict_types=1);

namespace Shared\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Shared\DTO\AbstractData;

abstract class AbstractRequest extends FormRequest
{
    abstract public function authorize(): bool;
    abstract public function rules(): array;
    abstract public function toData(): AbstractData;
}
