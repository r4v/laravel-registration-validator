<?php

namespace Niflheim\LaravelRegistrationValidator\Tests;

use Illuminate\Validation\Factory;
use Niflheim\LaravelRegistrationValidator\ServiceProvider;
use Orchestra\Testbench\TestCase;

class ValidationBase extends TestCase
{
    /**
     * @var Factory
     */
    protected $validator;

    protected function getPackageProviders($app)
    {
        return [ServiceProvider::class];
    }

    public function setUp(): void
    {
        parent::setUp();
        $this->validator = $this->app->make('validator');
    }
}
