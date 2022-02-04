<?php

use App\Enums\Sex;

return [

    'sex' => [
        Sex::Male->name => 'Masculino',
        Sex::Female->name => 'Feminino',
        Sex::NotApplicable->name => 'Não informado',
    ],

];
