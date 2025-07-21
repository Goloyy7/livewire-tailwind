<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Permission;

class PermissionServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $permission = new Permission();
        $fillable = $permission->getFillable();
        $permission->mergeFillable(array_merge($fillable, ['description']));
    }
}
