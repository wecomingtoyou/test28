<?php

declare(strict_types=1);

namespace Infrastructure\Events\Cars;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

final class CarWasDeleted
{
    use Dispatchable;
    use SerializesModels;

    public function __construct(
        public readonly int $id
    ) {
    }
}
