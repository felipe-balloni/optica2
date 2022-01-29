<?php

namespace App\Filament\Pages;

use Filament\Forms;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use JeffGreco13\FilamentBreezy\Pages\MyProfile;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;

class Profile extends MyProfile
{
    use HasPageShield;

    protected static ?string $navigationGroup = "Configurações";
    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static ?string $slug = 'profile';
    protected static ?string $navigationLabel = 'Perfil';

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
                ->label(__('filament-breezy::default.profile.personal_info.fields.name'))
                ->required(),
            Forms\Components\TextInput::make("email")->unique(ignorable: $this->user)
                ->label(__('filament-breezy::default.profile.personal_info.fields.email'))
                ->required(),
            Forms\Components\FileUpload::make('avatar')
                ->label('Avatar')
                ->directory('users')
                ->image(),
        ];
    }

    public function updateProfile()
    {
        $this->user->update($this->updateProfileForm->getState());
        $this->notify("success", __('filament-breezy::default.profile.personal_info.notify'));
    }

    protected function getUpdatePasswordFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make("new_password")
                ->label(__('filament-breezy::default.profile.password.fields.new_password'))
                ->password()
                ->rules(config('filament-breezy.password_rules'))
                ->required(),
            Forms\Components\TextInput::make("new_password_confirmation")
                ->label(__('filament-breezy::default.profile.password.fields.new_password_confirmation'))
                ->password()
                ->same("new_password")
                ->required(),
        ];
    }

    public function updatePassword()
    {
        $state = $this->updatePasswordForm->getState();
        $this->user->update([
            "password" => Hash::make($state["new_password"]),
        ]);
        session()->forget("password_hash_web");
        auth("web")->login($this->user);
        $this->notify("success", __('filament-breezy::default.profile.password.notify'));
        $this->reset(["new_password", "new_password_confirmation"]);
    }
}
