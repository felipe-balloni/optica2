<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

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

    protected static function booted()
    {
        static::created( function () {
            Cache::rememberForever('types', self::all());
        });
    }
}
