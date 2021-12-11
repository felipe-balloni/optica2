<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Arr;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getEditForm(): array
    {
        return [
            Forms\Components\Grid::make()
                ->columns(1)
                ->schema([
                    Forms\Components\TextInput::make('name')
                    ->label('Nome')
                    ->required(),
                    Forms\Components\FileUpload::make('avatar')
                        ->label('Avatar')
                        ->directory('users')
                        ->image()
                        ->imagePreviewHeight('180'),
                ]),
            Forms\Components\Fieldset::make('Senhas de acesso')
                ->schema([
                    Forms\Components\TextInput::make('password')
                        ->label('Senha')
                        ->password()
                        ->rules(['confirmed']),
                    Forms\Components\TextInput::make('password_confirmation')
                        ->label('Confirme a senha')
                        ->password(),
                    Forms\Components\Checkbox::make('isSuperAdmin')
                        ->label('Permissão especial Super Admin')
                        ->hidden(!User::IsSuperAdmin())
                        ->inline(),
                    Forms\Components\Checkbox::make('isActive')
                        ->label('Usuário está ativo')
                        ->inline(),
                ])
        ];
    }

    public function getForms(): array
    {
        return [
            'form' => $this->makeForm()
                ->model($this->record)
                ->schema($this->getEditForm())
                ->statePath('data'),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if ($data['password'] !== null) {
            $data['password'] = bcrypt( $data['password']);
            $data['password_confirmation'] = bcrypt( $data['password_confirmation']);
            ray($data);
            return $data;
        }

        return Arr::except($data, ['password', 'password_confirmation']);;

    }

    protected function getRedirectUrl(): ?string
    {
        return static::getResource()::getUrl();
    }

}
