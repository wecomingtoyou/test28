<?php

declare(strict_types=1);

namespace Infrastructure\Commands\Cars;

use Domains\Cars\Contracts\CarCommand;
use Domains\Cars\DTO\NewCarData;
use Domains\Cars\Models\Car;
use Infrastructure\Commands\EloquentCommand;
use Infrastructure\Events\Cars\CarWasCreated;
use Infrastructure\Events\Cars\CarWasDeleted;

final class CarEloquentCommand extends EloquentCommand implements CarCommand
{
    public function create(NewCarData $data): Car
    {
        $model = $this->builder()
            ->create($data->toArray());

        CarWasCreated::dispatchIf($model->wasRecentlyCreated, $model);

        return $model->load(['model', 'model.brand']);
    }

    public function delete(int $id): bool
    {
        $result = (bool) $this->builder()
            ->findOrFail($id)
            ->delete();

        CarWasDeleted::dispatchIf($result, $id);

        return $result;
    }
}
