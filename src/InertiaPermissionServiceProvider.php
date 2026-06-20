<?php

namespace SanSanLabs\InertiaPermission;

use SanSanLabs\InertiaPermission\Commands\GeneratePermissionTypesCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class InertiaPermissionServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-inertia-permissions')
            ->hasConfigFile('inertia-permissions')
            ->hasCommand(GeneratePermissionTypesCommand::class);
    }

    public function packageBooted(): void
    {
        // Publish stubs react
        $this->publishes([
            __DIR__.'/../stubs/react' => resource_path('js'),
        ], 'inertia-permissions-stubs-react');

        // Publish stubs vue
        $this->publishes([
            __DIR__.'/../stubs/vue' => resource_path('js'),
        ], 'inertia-permissions-stubs-vue');
    }
}
