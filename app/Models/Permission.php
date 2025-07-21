<?php

namespace App\Models;

use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    protected $fillable = [
        'name',
        'description',
        'guard_name'
    ];

    public static function boot()
    {
        parent::boot();
        
        static::creating(function ($model) {
            if (empty($model->guard_name)) {
                $model->guard_name = 'web';
            }
        });
    }
}
