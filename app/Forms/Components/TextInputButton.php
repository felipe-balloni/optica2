<?php

namespace App\Forms\Components;

use App\Forms\Concerns\HasButton;
use Filament\Forms\Components\TextInput;

class TextInputButton extends TextInput
{
    protected string $view = 'forms.components.text-input-button';

}
