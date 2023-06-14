<?php

declare(strict_types=1);

namespace Tests\Feature\Api\V2\Cars;

use Domains\Cars\Models\Car;
use Domains\Models\Models\Model;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Str;
use Infrastructure\Events\Cars\CarWasUpdated;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

final class UpdateCarTest extends TestCase
{
    private Car $model;

    protected function setUp(): void
    {
        parent::setUp();

        $this->model = Car::factory()->create();

        Event::fake();
    }

    public function testCarCanUpdated(): void
    {
        $model = Model::factory()->create();

        $response = $this->patchJson(
            uri: route('api:v1:cars:update', ['id' => $this->model->id]),
            data: $data = [
                'vin' => 'test',
                'model_id' => $model->id,
                'color' => 'test',
                'mileage' => 1000,
                'issued' => '1977-12-17',
            ]
        );

        $response->assertSuccessful();
        $response->assertJsonStructure(['data' => ['id', 'type', 'attributes', 'relations']]);

        $this->assertDatabaseHas(Car::class, $data);

        Event::assertDispatched(CarWasUpdated::class);
    }

    public function testFieldVinCodeMustBeUnique(): void
    {
        $car = Car::factory()->create();

        $response = $this->withExceptionHandling()
            ->patchJson(
                uri: route('api:v1:cars:update', ['id' => $this->model->id]),
                data: ['vin' => $car->vin]
            );

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertJsonValidationErrorFor('vin');
    }

    public function testFieldVinCodeMustExist(): void
    {
        $response = $this->withExceptionHandling()
            ->patchJson(
                uri: route('api:v1:cars:update', ['id' => $this->model->id]),
                data: ['model_id' => 100000]
            );

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertJsonValidationErrorFor('model_id');
    }
}
