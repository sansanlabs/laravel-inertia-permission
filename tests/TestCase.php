<?php

namespace SanSanLabs\InertiaPermission\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use SanSanLabs\InertiaPermission\InertiaPermissionServiceProvider;
use Spatie\Permission\PermissionServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            PermissionServiceProvider::class,
            InertiaPermissionServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app): void
    {
        config()->set('database.default', 'testing');
        config()->set('database.connections.testing', [
            'driver' => 'sqlite',
            'database' => ':memory:',
        ]);
    }
}
