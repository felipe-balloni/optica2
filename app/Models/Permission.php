<?php

declare(strict_types=1);

namespace App\Models;

class Permission extends \Spatie\Permission\Models\Permission
{
    protected $withCount = [
        'roles'
    ];
}
