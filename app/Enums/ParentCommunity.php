<?php

namespace App\Enums;

use Illuminate\Validation\Rules\Enum;

class ParentCommunity extends Enum
{
    const PARENT      = 0;
    const CHILD       = 1;
}
