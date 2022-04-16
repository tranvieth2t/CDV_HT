<?php

namespace App\Repositories;

use App\Enums\NewsStatus;
use App\Interfaces\NewsRepository;
use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class AdminRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class NewsRepositoryEloquent extends BaseRepository implements NewsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return News::class;
    }

    /**
     * @param $perPage
     * @param $condition
     * @param $columns
     * @return mixed
     */

    public function getListNews($perPage, $condition = [], $columns = ['*'])
    {
        return $this->model
            ->when(!empty($condition), function ($query) use ($condition) {
                return $query->where([$condition]);
            })
            ->paginate($perPage, $columns);
    }
}
