<?php

declare(strict_types=1);

namespace Tests\Feature\Api\V2\Cars;

use Domains\Cars\Models\Car;
use Tests\TestCase;

final class IndexCarTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Car::factory(10)->create();
    }

    public function testEndpointShouldReturnCarCollection(): void
    {
        $response = $this->getJson(
            uri: route('api:v1:cars:index', ['per_page' => 5]),
        );

        $response->assertSuccessful();
        $response->assertJsonCount(5, ['data']);
        $response->assertJsonStructure(['data', 'links', 'meta']);
    }
}
