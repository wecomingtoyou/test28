<?php

declare(strict_types=1);

namespace Tests\Feature\Api\V2\Cars;

use Domains\Cars\Models\Car;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

final class ShowCarTest extends TestCase
{
    private Car $model;

    protected function setUp(): void
    {
        parent::setUp();

        $this->model = Car::factory()->create();
    }

    public function testEndpointMustReturnExistingModel()
    {
        $response = $this->getJson(
            route('api:v1:cars:show', ['id' => $this->model->id])
        );

        $response->assertSuccessful();
        $response->assertJsonStructure(['data' => ['id', 'type', 'attributes', 'relations']]);
    }

    public function testCarModelNotFound()
    {
        $response = $this->withExceptionHandling()
            ->getJson(
                route('api:v1:cars:show', ['id' => 1111])
            );

        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }
}
