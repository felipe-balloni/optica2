<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\Sex;
use Carbon\Carbon;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'type_id',
        'email',
        'federal_id',
        'state_id',
        'date_birth',
        'sex',
        'defaulter',
        'comments',
    ];

    protected $casts = [
        'date_birth' => 'date',
        'defaulter' => 'boolean',
        'sex' => Sex::class
    ];

    protected $dates = [
        'date_birth',
    ];

    public function withFaker(): Generator
    {
        return Factory::create('pt_BR');
    }

    protected static function booted()
    {
        static::creating(fn ($client) => $client->user_id = Auth::id());
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(ClientAddress::class);
    }

    public function phones(): HasMany
    {
        return $this->hasMany(ClientPhone::class);
    }

    protected function DateBirth(): Attribute
    {
        return new Attribute(
            get: fn ($value) => Carbon::create($value)->format('Y-m-d'),
        );
    }

    protected function FederalId(): Attribute
    {
        return new Attribute(
            get: function ($value) {
                if (Str::length($value) === 11) {
                    return self::formatCPF($value);
                }
                if (Str::length($value) === 14) {
                    return self::formatCNPJ($value);
                }
                return $value;
            },
            set: fn ($value) => isset($value) ? preg_replace('/[^0-9]/', '', $value) : null,
        );
    }

    private static function formatCPF(string $value): string
    {
        return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $value);
    }

    private static function formatCNPJ(string $value): string
    {
        return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $value);
    }
}
