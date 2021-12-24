<?php

declare(strict_types=1);

namespace App\Models;

use Filament\Facades\Filament;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements FilamentUser, HasAvatar
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'avatar',
        'email',
        'password',
        'is_super_admin',
        'is_active'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_super_admin' => 'boolean',
        'is_active' => 'boolean',
    ];

    protected $with = [
        'roles',
    ];

    protected static function booted()
    {
        static::created( function () {
            Cache::rememberForever('users', fn() => self::all());
        });
    }

    public static function isSuperAdmin () : bool
    {
        return Auth::user()->is_super_admin;
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return ($this->avatar) ? url($this->avatar) : null;
    }

    public function canAccessFilament(): bool
    {
        return $this->is_active;
    }

    public function getNewAvatarAttribute(): ?string
    {
        return Filament::getUserAvatarUrl($this);
    }

}
