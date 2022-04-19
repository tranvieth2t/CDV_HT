<?php

namespace App\Enums;

use Illuminate\Validation\Rules\Enum;

class NewsHot extends Enum
{
    const NO_HOT    = 0;
    const HOT       = 1;
    const ALL = 2;
}
