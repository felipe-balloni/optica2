<?php

declare(strict_types=1);

namespace App\Models;

use Spatie\Permission\Models\Role;

class Roles extends Role
{
//    protected $with = [
//        'users',
//    ];

    protected $withCount = [
        'users',
    ];
}
