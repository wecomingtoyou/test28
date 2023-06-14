<?php

declare(strict_types=1);

namespace Tests\Feature\Api\V2\Cars;

use Domains\Cars\Models\Car;
use Domains\Models\Models\Model;
use Illuminate\Support\Facades\Event;
use Infrastructure\Events\Cars\CarWasCreated;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

final class CreateCarTest extends TestCase
{
    private Model $model;

    protected function setUp(): void
    {
        parent::setUp();

        $this->model = Model::factory()->create();

        Event::fake();
    }

    public function testCarCanCreated(): void
    {
        $model = Car::factory()
            ->make(['model_id' => $this->model->id]);

        $response = $this->postJson(
            uri: route('api:v1:cars:create'),
            data: $model->toArray()
        );

        $response->assertSuccessful();
        $response->assertJsonStructure(['data' => [
            'id', 'type',
            'attributes',
            'relations'
        ]]);

        $this->assertDatabaseHas(Car::class, ['vin' => $model->vin]);

        Event::assertDispatched(CarWasCreated::class);
    }

    public function tesFieldVinCodeIsRequired(): void
    {
        $response = $this->withExceptionHandling()
            ->postJson(route('api:v1:cars:create'));

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertJsonValidationErrorFor('vin');
    }

    public function testFieldVinCodeMustBeUnique(): void
    {
        $car = Car::factory()->create();

        $response = $this->withExceptionHandling()
            ->postJson(
                uri: route('api:v1:cars:create'),
                data: ['vin' => $car->vin]
            );

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertJsonValidationErrorFor('vin');
    }

    public function testFieldModelIdIsRequired(): void
    {
        $response = $this->withExceptionHandling()
            ->postJson(route('api:v1:cars:create'));

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertJsonValidationErrorFor('model_id');
    }

    public function testFieldVinCodeMustExist(): void
    {
        $response = $this->withExceptionHandling()
            ->postJson(
                uri: route('api:v1:cars:create'),
                data: ['model_id' => 100000]
            );

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertJsonValidationErrorFor('model_id');
    }
}
