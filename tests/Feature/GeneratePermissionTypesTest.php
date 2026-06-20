<?php

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

beforeEach(function () {
    $this->artisan('migrate', ['--path' => 'vendor/spatie/laravel-permission/database/migrations']);
});

it('generates typescript types from database', function () {
    Role::create(['name' => 'Super Admin', 'guard_name' => 'web']);
    Role::create(['name' => 'Admin', 'guard_name' => 'web']);
    Permission::create(['name' => 'edit-user', 'guard_name' => 'web']);
    Permission::create(['name' => 'view-user', 'guard_name' => 'web']);

    $this->artisan('inertia-permission:generate')->assertSuccessful();

    $path = config('inertia-permission.output_path');
    $content = file_get_contents($path);

    expect($content)
        ->toContain("| 'Super Admin'")
        ->toContain("| 'Admin'")
        ->toContain("| 'edit-user'")
        ->toContain("| 'view-user'")
        ->toContain('SUPER_ADMIN_ROLE');
});

it('fails gracefully when no roles or permissions exist', function () {
    $this->artisan('inertia-permission:generate')
        ->assertFailed()
        ->expectsOutput('No roles or permissions found in database.');
});
