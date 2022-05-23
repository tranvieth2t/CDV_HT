<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vocation extends Model
{
    use HasFactory;
    protected $table = 'vocation';

    protected $fillable = [
        'id',
        'title',
        'thumbnail',
        'description',
        'date_time',
        'content',
        'verify',
        'community_id',
        'created_by',
        'created_at',
        'updated_at',
    ];
    protected $appends = [
        'is_thumbnail_default',
    ];

    public function getIsThumbnailDefaultAttribute () {
        return ($this->thumbnail == config('constants.vocation_thumbnail_default')) ;
    }
    public function admin()
    {
        return $this->hasOne(Admin::class, 'id','created_by');
    }

    public function community()
    {
        return $this->hasOne(Community::class, 'id', 'community_id');
    }
}
