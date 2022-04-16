<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    protected $table = 'community';

    protected $fillable = [
        'id',
        'name',
        'description',
        'content',
        'facebook',
        'instagram',
        'youtube',
        'tel',
        'created_at',
        'updated_at',
    ];
}
