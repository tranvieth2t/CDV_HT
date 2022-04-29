<?php

namespace App\Repositories;

use App\Enums\BannerVerify;
use App\Enums\ParentCommunity;
use App\Interfaces\BannerRepository;
use App\Models\Banner;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Eloquent\BaseRepository;
use App\Enums\Community;
use DB;

/**
 * Class AdminRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class BannerRepositoryEloquent extends BaseRepository implements BannerRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Banner::class;
    }

    /**
     * @param $perPage
     * @param $condition
     * @param $columns
     * @return mixed
     */

    public function getListBanner($perPage, $conditions = [], $columns = ['*'])
    {
        return $this->model
            ->with('admin')
            ->orderByDesc('created_at')->paginate(10);
    }
}
