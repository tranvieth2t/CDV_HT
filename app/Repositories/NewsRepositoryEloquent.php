<?php

namespace App\Repositories;

use App\Enums\NewsHot;
use App\Enums\NewsStatus;
use App\Enums\NewsVerify;
use App\Interfaces\NewsRepository;
use App\Models\News;
use http\Client\Curl\User;
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
        $admin = Auth::guard('admin')->user();
        $query = $this->model;

        if (isset($conditions['title'])) {
            $query = $query->where('title', 'LIKE', '%'.$conditions['title'].'%');

        }
        if (isset($conditions['community_id']) and $conditions['community_id'] != 'none') {
            $query = $query->where('community_id', $conditions['community_id']);
        }
        if (isset($conditions['verify']) and $conditions['verify'] != NewsVerify::ALL) {
            $query = $query->where('verify', $conditions['verify']);
        }
        if (isset($conditions['hot']) and $conditions['hot'] != NewsHot::ALL) {
            $query = $query->where('hot', $conditions['hot']);
        }
        if (isset($conditions['startDate'])) {
            $query = $query->where('created_at', '>=', $conditions['startDate']);
        }
        if (isset($conditions['endDate'])) {
            $query = $query->where('created_at', '<=', $conditions['endDate']);
        }

        if (isset($conditions['orderBy'])) {
            switch ($conditions['orderBy']) {
                case 1 :
                case 0 :
                {
                    $query = $query->orderBy('id', 'ASC');
                    break;
                }
                case 2 :
                {
                    $query = $query->orderBy('id', 'DESC');
                    break;
                }
                case 3 :
                {
                    $query = $query->orderBy('hot', 'DESC');
                    break;
                }
                case 4 :
                {
                    $query = $query->orderBy('verify', 'DESC');
                    break;
                }
                case 5 :
                {
                    $query = $query->orderBy('community_id', 'ASC');
                    break;
                }

                default:
                {
                    $query = $query->orderByDesc('id');
                }
            }
        }

        return $query->with('admin', 'community')
            ->paginate($perPage, $columns);
    }

    public function getListNewHot($perPage, $conditions = [], $columns = ['*'])
    {
        $query = $this->model;
        $query = $query->where('hot', NewsHot::HOT)->get();
        return $query;
    }

}
