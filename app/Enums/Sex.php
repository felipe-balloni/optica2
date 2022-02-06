<?php

declare(strict_types=1);

namespace App\Enums;

enum Sex: int
{
    case Male           = 1;
    case Female         = 2;
    case NotApplicable  = 3;
}
