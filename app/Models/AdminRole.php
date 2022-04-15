<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminRole extends Model
{

    protected $table = 'admin_role';

    protected $fillable = [
        'name',
        'created_by',
        'updated_by',
        'description',
        'role_admin',
        'created_at',
        'updated_at',

    ];
}

