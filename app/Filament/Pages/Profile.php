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
                ->label(__('filament-breezy::default.fields.name'))
                ->required(),
            Forms\Components\TextInput::make("email")
                ->unique(ignorable: $this->user)
                ->label(__('filament-breezy::default.fields.email'))
                ->disabled()
                ->required(),
            Forms\Components\FileUpload::make('avatar')
                ->label('Avatar')
                ->directory('users')
                ->image(),
        ];
    }
}
