<?php

namespace App\Enums;

use Illuminate\Validation\Rules\Enum;

class BannerVerify extends Enum
{
    const NOT_VERIFY = 0;
    const VERIFY = 1;
}
