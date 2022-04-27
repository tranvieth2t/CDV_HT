<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';

    protected $fillable = [
        'id',
        'title',
        'thumbnail',
        'description',
        'content',
        'verify',
        'hot',
        'tag',
        'censors',
        'community_id',
        'created_by',
        'created_at',
        'updated_at',
    ];

    public function admin()
    {
        return $this->hasOne(Admin::class, 'id','created_by');
    }
    public function censorsAdmin()
    {
        return $this->hasOne(Admin::class, 'id','censors');
    }

    public function community()
    {
        return $this->hasOne(Community::class, 'id', 'community_id');
    }
}
