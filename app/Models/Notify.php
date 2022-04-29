<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
    use HasFactory;
    protected $table = 'notify';

    protected $fillable = [
        'id',
        'title',
        'thumbnail',
        'description',
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
        return ($this->thumbnail == config('constants.notify_thumbnail_default')) ;
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
