<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Support\Facades\Cache;

class Permission extends \Spatie\Permission\Models\Permission
{
//    protected $withCount = [
//        'roles'
//    ];
//
//    protected $with = [
//        'roles'
//    ];

//    protected static function booted()
//    {
//        static::created( function () {
//            Cache::remember('spatie.permission.cache', config('permission.cache.expiration_time'), function () {
//                self::all();
//            });
//        });
//
//        Cache::get('spatie.permission.cache');
//
//        \cache()->forget('spatie.permission.cache');
//    }

}
