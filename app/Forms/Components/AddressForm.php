<?php

declare(strict_types=1);

namespace App\Forms\Components;

use App\Models\City;
use App\Models\ClientAddress;
use App\Models\State;
use App\Models\Type;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Filament\Forms;

class AddressForm extends Forms\Components\Field
{
    protected string $view = 'forms::components.group';

    public ?string $relationship = 'addresses';

    public function relationship(string|callable $relationship): static
    {
        $this->relationship = $relationship;

        return $this;
    }

    public function saveRelationships(): void
    {
        $state = $this->getState();
        $model = $this->getModel();
        $relationship = $model->{$this->relationship}();

        if ($address = $relationship->first()) {
            $address->update($state);
        } else {
            $relationship->updateOrCreate($state);
        }

        $model->touch();
    }

    public function getChildComponents(): array
    {
        return [
            Forms\Components\HasManyRepeater::make('addresses')
                ->label('Endereços')
                ->relationship('addresses')
                ->defaultItems(1)
                ->schema([
                    Forms\Components\Grid::make()
                        ->schema([
                            Forms\Components\Select::make('type_id')
                                ->label('Tipo do endereço')
                                ->helperText('Selecione o tipo do endereço.')
                                ->options(Type::getTypes('Addresses'))
                                ->default(6)
                                ->required(),
                            TextInputButton::make('cep')
                                ->id('cep')
                                ->maxLength(8)
                                ->stateBindingModifiers(['lazy']),
                            Forms\Components\TextInput::make('postal_code')
                                ->label('CEP')
                                ->helperText('Digite o CEP que o sistema irá tentar preencher os demais campos.')
        //                                    ->maxLength(9)
                                ->reactive()
                                ->afterStateUpdated(function (callable $set, $state) {
                                    $set('cep', Str::length($state));
                                    if (Str::length($state) === 9) {
                                        $data = ClientAddress::GetAddress($state);
                                        if ($data !== 404) {
                                            $set('address_1', $data['street']);
                                            $set('address_2', $data['neighborhood']);
                                            $set('state_id', $data['state']);
                                            $set('city_id', $data['city']);
                                        }
                                    }
                                })
        //                                    ->stateBindingModifiers(['lazy'])
                                ->mask(fn(Forms\Components\TextInput\Mask $mask) => $mask->pattern('00.000`-000'))
                                ->required(),
                        ]),

                    Forms\Components\Fieldset::make('Endereços')
                        ->schema([
                            Forms\Components\Grid::make()
                                ->schema([
                                    Forms\Components\TextInput::make('address_1')
                                        ->label('Endereço')
                                        ->required()
                                        ->columnSpan(2),
                                    Forms\Components\TextInput::make('number')
                                        ->label('Número')
                                        ->required(),
                                ])
                                ->columns(3),
                            Forms\Components\Grid::make()
                                ->schema([
                                    Forms\Components\TextInput::make('complement')
                                        ->label('Complemento'),
                                    Forms\Components\TextInput::make('address_2')
                                        ->label('Bairro')
                                        ->required(),
                                    Forms\Components\Select::make('state_id')
                                        ->label('Estado')
                                        ->helperText('Selecione o estado.')
                                        ->options(
                                            State::getState()->pluck('state', 'id')
                                        )
                                        ->reactive()
                                        ->afterStateUpdated(function (callable $set) {
                                            $set('city_id', null);
                                        })
                                        ->required(),
                                    Forms\Components\Select::make('city_id')
                                        ->label('Cidade')
                                        ->options(function (callable $get) {
                                            if ($get('state_id')) {
                                                return City::getCitiesOfState((int)$get('state_id'))->pluck('city', 'id');
                                            }
                                            return [];
                                        })
                                        ->required(),
                                ]),
                            Forms\Components\Textarea::make('comments')
                                ->rows(1)
                                ->label('Observação geral')
                                ->columnSpan(2),
                        ])
                ])
                ->createItemButtonLabel('Adicionar endereço')
                ->columnSpan(2),
        ];
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->afterStateHydrated(function (AddressForm $component) {
            $model = $component->getModel();

            $address = $model instanceof Model ? $model->getRelationValue($this->relationship) : null;

            $component->state($address ? $address->toArray() : [
                'type_id' => null,
                'postal_code' => null,
                'address_1' => null,
                'number' => null,
                'complement' => null,
                'address_2' => null,
                'state_id' => null,
                'city_id' => null,
                'comments' => null,
            ]);

        });

        $this->dehydrated(false);
    }

}
