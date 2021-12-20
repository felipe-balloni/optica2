<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Cache;

class City extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'city'
    ];

    protected static function booted()
    {
        static::created( function () {
            Cache::forget('cities');
            Cache::rememberForever('cities', fn() => self::all());
        });
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }
}
