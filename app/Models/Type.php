<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use phpDocumentor\Reflection\Types\Boolean;
use phpDocumentor\Reflection\Types\Collection;

class Type extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'used_by',
        'is_default',
    ];

    protected $casts = [
      'is_default' => 'boolean',
    ];

    public const MODULES = [
        'Clients' => 'Clients',
        'Phones' => 'Phones',
        'Addresses' => 'Addresses',
        'Recipes' => 'Recipes',
    ];

    protected static function booted(): void
    {
        static::created(function ($type) {
            Cache::forget('types::of::' . $type->used_by);
        });

        static::updated(function ($type) {
            Cache::forget('types::of::' . $type->used_by);
        });

        static::deleted(function ($type) {
            Cache::forget('types::of::' . $type->used_by);
        });
    }

    public static function getTypes(string $model): mixed
    {
        return Cache::rememberForever('types::of::' .  $model, fn () => self::where('used_by', $model)->pluck('name', 'id'));
    }
}
