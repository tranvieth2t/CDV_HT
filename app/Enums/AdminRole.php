<?php

namespace App\Enums;

use Illuminate\Validation\Rules\Enum;

class AdminRole extends Enum
{
    const DEFAULT_PASSWORD_LENGTH = 8;

    const EDITS = 3;
    const ADMIN = 2;
    const SUPPER_ADMIN = 1;

    const ALL_ROLES = [self::EDITS, self::ADMIN, self::SUPPER_ADMIN];
}
