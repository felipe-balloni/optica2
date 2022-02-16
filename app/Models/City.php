<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Collection;

class City extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'city',
        'cod_ibge'
    ];

    protected static function booted()
    {
        static::created(function ($city) {
            Cache::forget('cities::of::state::' . $city->state_id);
            Cache::forget('cities');
        });

        static::updated(function ($city) {
            Cache::forget('cities::of::state::' . $city->state_id);
            Cache::forget('cities');
        });

        static::deleted(function ($city) {
            Cache::forget('cities::of::state:::' . $city->state_id);
            Cache::forget('cities');
        });
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    public static function getCities(): Collection
    {
        return Cache::rememberForever('cities', fn () => self::all());
    }

    public static function getCitiesOfState(int $state_id): mixed
    {
        return Cache::rememberForever('cities::of::state::' . $state_id, fn () => self::getCities()->where('state_id', $state_id));
    }
}
