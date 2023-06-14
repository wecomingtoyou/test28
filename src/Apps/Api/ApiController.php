<?php

declare(strict_types=1);

namespace Apps\Api;

use Shared\Http\Controllers\Controller;

abstract class ApiController extends Controller
{
    protected function perPage(): int
    {
        $limit = (int) request()->get('per_page', 10);

        return $limit > 100 ? 10 : $limit;
    }
}
