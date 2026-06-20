<?php

namespace SanSanLabs\InertiaPermission\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see Skeleton
 */
class InertiaPermission extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \SanSanLabs\InertiaPermission\InertiaPermission::class;
    }
}
