<?php

declare(strict_types=1);

namespace Infrastructure\Commands\Cars;

use Domains\Cars\Contracts\CarCommand;
use Infrastructure\Commands\EloquentCommand;
use Infrastructure\Events\Cars\CarWasDeleted;

final class CarEloquentCommand extends EloquentCommand implements CarCommand
{
    public function delete(int $id): bool
    {
        $result = (bool) $this->builder()
            ->findOrFail($id)
            ->delete();

        CarWasDeleted::dispatchIf($result, $id);

        return $result;
    }
}
