<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;

class State extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'state',
        'abbreviation'
    ];

    protected static function booted()
    {
        static::created(function () {
            Cache::forget('states');
        });

        static::updated(function () {
            Cache::forget('states');
        });

        static::deleted(function () {
            Cache::forget('states');
        });
    }

    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }

    public static function getState()
    {
        return Cache::rememberForever('states', fn () => self::all());
    }
}
