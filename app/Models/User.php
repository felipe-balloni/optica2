<?php

declare(strict_types=1);

namespace App\Models;

use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Storage;
use Filament\Models\Contracts\HasAvatar;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

    protected $appends = ['new_avatar'];

    public static function isSuperAdmin(): bool
    {
        return Auth::user()->is_super_admin;
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return ($this->avatar)
            ? Storage::disk(config('filament.default_filesystem_disk'))->url($this->avatar)
            : null;
    }

    public function canAccessFilament(): bool
    {
        return $this->is_active;
    }

    protected function newAvatar(): Attribute
    {
        return new Attribute(
            get: fn () => Filament::getUserAvatarUrl($this),
        );
    }

    public function clients(): hasMany
    {
        return $this->hasMany(Client::class);
    }
}
