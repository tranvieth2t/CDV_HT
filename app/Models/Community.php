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
        'color',
        'facebook',
        'parent',
        'instagram',
        'youtube',
        'tel',
        'created_at',
        'updated_at',
    ];

    public function news()
    {
        return $this->hasMany(News::class, 'community_id', );
    }
}
