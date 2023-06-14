<?php

declare(strict_types=1);

namespace Tests;

use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Shared\Exceptions\Handler;
use Throwable;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use LazilyRefreshDatabase;

    protected function setUp() : void
    {
        parent::setUp();

        $this->disableExceptionHandling();
    }

    protected function disableExceptionHandling(): void
    {
        $this->oldExceptionHandler = $this->app->make(
            abstract: ExceptionHandler::class
        );

        $this->app->instance(
            abstract: ExceptionHandler::class,
            instance: new class extends Handler {
                public function __construct() {}
                public function report( $e) {}
                public function render($request, Throwable $e) {
                    throw $e;
                }
            }
        );
    }

    protected function withExceptionHandling(): static
    {
        $this->app->instance(
            abstract: ExceptionHandler::class,
            instance: $this->oldExceptionHandler
        );

        return $this;
    }

    protected static function getMethod($class, string $method, array $args = []): mixed
    {
        $reflection = new ReflectionClass(
            objectOrClass: get_class($class)
        );

        $method = $reflection->getMethod($method);
        $method->setAccessible(true);

        return $method->invokeArgs($class, $args);
    }
}
