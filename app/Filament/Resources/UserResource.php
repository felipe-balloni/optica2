<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-s-users';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationGroup = 'Tabelas';

    protected static ?int $navigationSort = 1;

    protected static ?string $label = 'Usuário';

    protected static ?string $pluralLabel = 'Usuários';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
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
                        Forms\Components\TextInput::make('email')
                            ->label('E-mail')
                            ->email()
                            ->unique(User::class)
                            ->required(),
                    ]),
                Forms\Components\Fieldset::make('Senhas de acesso')
                    ->schema([
                        Forms\Components\TextInput::make('password')
                            ->label('Senha')
                            ->password()
                            ->rules(['confirmed'])
                            ->dehydrateStateUsing( fn ($state) => Hash::make($state))
                            ->required(),
                        Forms\Components\TextInput::make('password_confirmation')
                            ->label('Confirme a senha')
                            ->password()
                            ->required()
                            ->dehydrated(false),
                        Forms\Components\Checkbox::make('isSuperAdmin')
                            ->label('Permissão especial Super Admin')
                            ->hidden(!User::IsSuperAdmin())
                            ->inline(),
                        Forms\Components\Checkbox::make('isActive')
                            ->label('Usuário está ativo')
                            ->inline(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('avatar')
                    ->size(50)
                    ->rounded(),
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\BooleanColumn::make('isActive')
            ])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

}
