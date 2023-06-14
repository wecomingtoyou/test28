<?php

declare(strict_types=1);

namespace Infrastructure\Repositories\Cars;

use Domains\Cars\Contracts\CarRepository;
use Infrastructure\Repositories\EloquentRepository;

final class CarEloquentRepository extends EloquentRepository implements CarRepository
{

}
