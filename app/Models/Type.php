<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'used_by',
    ];

    public const MODULES = [
        'Clients' => 'Clients',
        'Phones' => 'Phones',
        'Addresses' => 'Addresses',
        'Recipes' => 'Recipes',
    ];
}
