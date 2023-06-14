<?php

declare(strict_types=1);

namespace Tests\Feature\Api\V2\Cars;

use Domains\Cars\Models\Car;
use Illuminate\Support\Facades\Event;
use Infrastructure\Events\Cars\CarWasDeleted;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

final class DeleteCarTest extends TestCase
{
    private Car $car;

    protected function setUp(): void
    {
        parent::setUp();

        $this->car = Car::factory()->create();

        Event::fake();
    }

    public function testCarCanDeleted(): void
    {
        $response = $this->deleteJson(
            uri: route('api:v1:cars:delete', ['id' => $this->car->id])
        );

        $response->assertStatus(Response::HTTP_NO_CONTENT);
        $this->assertDatabaseMissing(Car::class, ['id' => $this->car->id]);

        Event::assertDispatched(CarWasDeleted::class);
    }

    public function testModelNotFound(): void
    {
        $response = $this->withExceptionHandling()
            ->deleteJson(
                uri: route('api:v1:cars:delete', ['id' => 100000])
            );

        $response->assertStatus(Response::HTTP_NOT_FOUND);

        Event::assertNotDispatched(CarWasDeleted::class);
    }
}
