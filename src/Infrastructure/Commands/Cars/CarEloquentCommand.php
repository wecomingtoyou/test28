<?php

declare(strict_types=1);

namespace Infrastructure\Commands\Cars;

use Domains\Cars\Contracts\CarCommand;
use Domains\Cars\DTO\CarData;
use Domains\Cars\Models\Car;
use Infrastructure\Commands\EloquentCommand;
use Infrastructure\Events\Cars\CarWasCreated;
use Infrastructure\Events\Cars\CarWasDeleted;
use Infrastructure\Events\Cars\CarWasUpdated;

final class CarEloquentCommand extends EloquentCommand implements CarCommand
{
    public function update(int $id, CarData $data): Car
    {
        $model = $this->builder()
            ->findOrFail($id);

        /** @var Car $model */
        $model = tap($model)->update($data->toArray());

        CarWasUpdated::dispatchIf($model->wasChanged(), $model);

        return $model->load(['model', 'model.brand']);
    }

    public function create(CarData $data): Car
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
