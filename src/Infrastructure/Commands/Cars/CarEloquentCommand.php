<?php

declare(strict_types=1);

namespace Infrastructure\Commands\Cars;

use Domains\Cars\Contracts\CarCommand;
use Infrastructure\Commands\EloquentCommand;

final class CarEloquentCommand extends EloquentCommand implements CarCommand
{

}
