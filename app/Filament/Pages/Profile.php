<?php

namespace App\Filament\Pages;

use Filament\Forms;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use JeffGreco13\FilamentBreezy\Pages\MyProfile;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Pages\Page;

class Profile extends MyProfile
{
    use HasPageShield;

    protected static ?string $navigationGroup = "Configurações";
    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static ?string $slug = 'profile';
    protected static ?int $navigationSort = 99;

    public User $user;

    public function mount()
    {
        $this->user = auth()->user();
        $this->updateProfileForm->fill($this->user->toArray());
    }

    protected function getUpdateProfileFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make("name")
                ->label(__('filament-breezy::default.fields.name'))
                ->maxLength(250)
                ->required(),
            Forms\Components\TextInput::make("email")
                ->label(__('filament-breezy::default.fields.email'))
                ->maxLength(250)
                ->unique(ignorable: $this->user)
                ->disabled()
                ->required(),
            Forms\Components\FileUpload::make('avatar')
                ->label('Avatar')
                ->maxSize(2048)
                ->directory('users')
                ->image(),
        ];
    }

    protected function getUpdatePasswordFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make("new_password")
                ->label(__('filament-breezy::default.fields.new_password'))
                ->maxLength(250)
                ->password()
                ->rules(config('filament-breezy.password_rules'))
                ->required(),
            Forms\Components\TextInput::make("new_password_confirmation")
                ->label(__('filament-breezy::default.fields.new_password_confirmation'))
                ->maxLength(250)
                ->password()
                ->same("new_password")
                ->required(),
        ];
    }

    protected static function getNavigationGroup(): ?string
    {
        return 'Usuário';
    }

    public static function getNavigationLabel(): string
    {
        return __('filament-breezy::default.profile.profile');
    }

    protected function getTitle(): string
    {
        return __('filament-breezy::default.profile.my_profile');
    }
}
