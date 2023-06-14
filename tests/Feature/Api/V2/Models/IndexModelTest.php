<?php

declare(strict_types=1);

namespace Tests\Feature\Api\V2\Models;

use Domains\Models\Models\Model;
use Tests\TestCase;

final class IndexModelTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Model::factory(10)
            ->create();
    }

    public function testEndpointShouldReturnModelCollection(): void
    {
        $response = $this->getJson(
            uri: route('api:v1:models:index', ['per_page' => 5]),
        );

        $response->assertSuccessful();
        $response->assertJsonCount(5, ['data']);
        $response->assertJsonStructure(['data', 'links', 'meta']);
    }
}
