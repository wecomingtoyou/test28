<?php

declare(strict_types=1);

namespace Infrastructure\Events\Cars;

use Domains\Cars\Models\Car;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

final class CarWasUpdated
{
    use Dispatchable;
    use SerializesModels;

    public function __construct(
        public readonly Car $car
    ) {
    }
}
