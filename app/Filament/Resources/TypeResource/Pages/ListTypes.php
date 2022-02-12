<?php

namespace App\Filament\Resources\TypeResource\Pages;

use App\Filament\Resources\TypeResource;
use Filament\Resources\Pages\ListRecords;

class ListTypes extends ListRecords
{
    use ListRecords\Concerns\CanCreateRecords;
    use ListRecords\Concerns\CanDeleteRecords;
    use ListRecords\Concerns\CanEditRecords;

    protected static string $resource = TypeResource::class;
}
