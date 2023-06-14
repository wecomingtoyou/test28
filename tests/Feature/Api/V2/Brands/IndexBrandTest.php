<?php

declare(strict_types=1);

namespace Tests\Feature\Api\V2\Brands;

use Domains\Brands\Models\Brand;
use Tests\TestCase;

final class IndexBrandTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Brand::factory(10)->create();
    }

    public function testEndpointShouldReturnBrandCollection(): void
    {
        $response = $this->getJson(
            uri: route('api:v1:brands:index', ['per_page' => 5]),
        );

        $response->assertSuccessful();
        $response->assertJsonCount(5, ['data']);
        $response->assertJsonStructure(['data', 'links', 'meta']);
    }
}
