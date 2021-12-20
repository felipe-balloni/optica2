<?php

namespace App\Tables\Columns;

use Filament\Tables\Columns\Column;

class Address extends Column
{
    protected string $view = 'tables.columns.address';

    public static function GetAddress($state)
    {
    }
}
