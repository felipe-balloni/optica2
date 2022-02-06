<?php

use App\Enums\Sex;

return [

    'sex' => [
        Sex::Male->name => 'Male',
        Sex::Female->name => 'Female',
        Sex::NotApplicable->name => 'Not Applicable',
    ],

];
