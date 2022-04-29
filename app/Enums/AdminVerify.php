<?php

namespace App\Enums;

use Illuminate\Validation\Rules\Enum;

class AdminVerify extends Enum
{
    const VERIFY = 1;
    const NOT_VERIFY = 2;
}
