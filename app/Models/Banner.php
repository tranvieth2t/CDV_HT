<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $table = 'banner';

    protected $fillable = [
        'id',
        'title',
        'thumbnail',
        'thumbnail_small',
        'verify',
        'start_date',
        'end_date',
        'link',
        'created_by',
        'created_at',
        'updated_at',
    ];

    protected $appends = [
        'is_thumbnail_default',
        'is_thumbnail_small_default',
    ];

    public function getIsThumbnailDefaultAttribute()
    {
        return ($this->thumbnail == config('constants.banner_thumbnail_default'));

    }

    public function getIsThumbnailSmallDefaultAttribute()
    {
        return ($this->thumbnail_small == config('constants.banner_thumbnail_small_default'));
    }

    public function admin()
    {
        return $this->hasOne(Admin::class, 'id', 'created_by');
    }

}
