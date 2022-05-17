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
        'thumbnail',
        'content',
        'facebook',
        'parent',
        'instagram',
        'youtube',
        'tel',
        'created_at',
        'updated_at',
    ];
    protected $appends = [
        'is_thumbnail_default',
    ];

    public function getIsThumbnailDefaultAttribute()
    {
        return ($this->thumbnail == config('constants.community_thumbnail_default'));

    }
    public function news()
    {
        return $this->hasMany(News::class, 'community_id', 'id');
    }

    public function newsFavaros()
    {
        return $this->hasMany(News::class, 'community_id', 'id')->limit(2);
    }
}
