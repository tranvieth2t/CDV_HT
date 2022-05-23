<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Couple extends Model
{
    use HasFactory;
    protected $table = 'couple';

    protected $fillable = [
        'id',
        'male',
        'community_male_id',
        'female',
        'community_female_id',
        'thumbnail',
        'description',
        'content',
        'verify',
        'created_by',
        'date_wedding',
        'created_at',
        'updated_at',
    ];

    protected $appends = [
        'is_thumbnail_default',
    ];

    public function getIsThumbnailDefaultAttribute () {
        return ($this->thumbnail == config('constants.couple_thumbnail_default')) ;
    }
    public function admin()
    {
        return $this->hasOne(Admin::class, 'id','created_by');
    }

    public function communityMale()
    {
        return $this->hasOne(Community::class, 'id', 'community_male_id');
    }
    public function communityFemale()
    {
        return $this->hasOne(Community::class, 'id', 'community_female_id');
    }
}
