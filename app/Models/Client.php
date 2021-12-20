<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'type_id',
        'federal_id',
        'state_id',
        'date_birth',
        'sex',
        'defaulter',
        'comments',
    ];

    protected $casts = [
        'date_birth' => 'date',
        'defaulter' => 'boolean'
    ];

    protected $with = [

    ];

    protected $withCount = [

    ];

    protected static function booted()
    {
        static::creating( fn($client) => $client->user_id = Auth::id());
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

}