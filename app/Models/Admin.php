<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\AdminRole;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'admins';

    protected $guarded = 'admin';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_code',
        'verify_token',
        'verify'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function adminRole()
    {
        return $this->belongsTo(AdminRole::class, "role_code");
    }
}

