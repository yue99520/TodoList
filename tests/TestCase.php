<?php

namespace Tests;

use Faker\Generator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    protected Generator $faker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->faker = $this->app->make(Generator::class);
    }
}
