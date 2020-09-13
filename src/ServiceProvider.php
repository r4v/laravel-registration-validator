<?php
namespace Niflheim\LaravelRegistrationValidator;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;
use Illuminate\Validation\Factory;

class ServiceProvider extends IlluminateServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     * @throws BindingResolutionException
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/registration-validation.php' => config_path('registration-validation.php')
        ], 'config');

        /** @var Factory $validator */
        $validator = $this->app->make('validator');
        $validator->extend('not_reserved_name', '\Niflheim\LaravelRegistrationValidator\Validators@validateNotReservedName');
        $validator->extend('not_confusable_string', '\Niflheim\LaravelRegistrationValidator\Validators@validateConfusable');
        $validator->extend('not_confusable_email', '\Niflheim\LaravelRegistrationValidator\Validators@validateConfusableEmail');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/registration-validation.php',
            'registration-validation'
        );
    }
}
