<?php

namespace App\Repositories;

use App\Enums\CommunityStatus;
use App\Interfaces\CommunityRepository;
use App\Models\Community;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class AdminRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CommunityRepositoryEloquent extends BaseRepository implements CommunityRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Community::class;
    }

    /**
     * @param $perPage
     * @param $condition
     * @param $columns
     * @return mixed
     */

    public function getListCommunity()
    {
        return $this->model
            ->pluck('name', 'id');
    }
}
