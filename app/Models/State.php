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

    protected $with = [
        'cities',
    ];

    protected $withCount = [
        'cities',
    ];

    protected $fillable = [
        'state',
        'abbreviation'
    ];

    protected static function booted()
    {
        static::created( function () {
            Cache::forget('states');
            Cache::rememberForever('states', fn() => self::all());
        });
    }

    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }
}
