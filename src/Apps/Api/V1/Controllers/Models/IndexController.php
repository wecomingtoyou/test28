<?php

declare(strict_types=1);

namespace Apps\Api\V1\Controllers\Models;

use Apps\Api\ApiController;
use Illuminate\Contracts\Support\Responsable;

final class IndexController extends ApiController
{
    public function __construct(

    ) {
    }

    public function __invoke(): Responsable
    {
        // TODO: Implement __invoke() method.
    }
}
