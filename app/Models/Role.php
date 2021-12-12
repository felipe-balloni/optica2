<?php

declare(strict_types=1);

namespace App\Models;

class Role extends \Spatie\Permission\Models\Role
{
//    protected $with = [
//        'users',
//    ];

    protected $withCount = [
        'users',
    ];
}
