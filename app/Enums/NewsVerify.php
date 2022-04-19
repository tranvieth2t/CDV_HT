<?php

namespace App\Enums;

use Illuminate\Validation\Rules\Enum;

class NewsVerify extends Enum
{
    const VERIFY = 1;
    const NOT_VERIFY = 0;
    const ALL = 2;
}
