<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Support\Facades\Cache;

class Role extends \Spatie\Permission\Models\Role
{

    protected static function booted()
    {
        static::created( function () {
            Cache::rememberForever('roles', fn() => self::all());
        });
    }
}
