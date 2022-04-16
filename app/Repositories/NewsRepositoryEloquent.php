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

    public function getListNews($perPage, $conditions = [], $columns = ['*'])
    {
        $query = $this->model;
        if (isset($conditions['community_id']) and $conditions['community_id']) {
            $query =  $query->where('community_id', $conditions['community_id']);
        }
        if (isset($conditions['verify'])) {
            $query =  $query->where('verify', $conditions['verify']);
        }
        if (isset($conditions['startDate'])) {
            $query = $query->where('created_at', '>=', $conditions['startDate']);
        }
        if (isset($conditions['endDate'])) {
            $query =  $query->where('created_at', '<=', $conditions['endDate']);
        }
        if (isset($conditions['title'])) {
            $query =  $query->where('title', 'LIKE', $conditions['endDate']);
        }
        return $query->orderByDesc('created_at')
            ->paginate($perPage, $columns);
    }
}
