<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use phpDocumentor\Reflection\Types\Collection;

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

    protected static function booted(): void
    {
        static::created( function () {
            Cache::forget('types');
            Cache::rememberForever('types', fn() => self::all());
        });
    }

    public static function getTypes(string $model): mixed
    {
        return Cache::rememberForever('types::of::' .  $model, fn() => self::where('used_by', $model)->pluck('name', 'id'));
    }


}
