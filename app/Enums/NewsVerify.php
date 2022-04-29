<?php

namespace App\Enums;

use Illuminate\Validation\Rules\Enum;

class NewsVerify extends Enum
{
    const NOT_VERIFY = 0;
    const VERIFY = 1;
    const WAIT = 2;
    const ALL = 3;
}
