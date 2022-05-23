<?php

namespace App\Repositories;

use App\Interfaces\CoupleRepository;
use App\Models\Couple;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class CoupleRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CoupleRepositoryEloquent extends BaseRepository implements CoupleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Couple::class;
    }

    /**
     * @param $perPage
     * @param $condition
     * @param $columns
     * @return mixed
     */

    public function getListCouple($perPage, $conditions = [], $columns = ['*'])
    {
        return $this->model
            ->orderByDesc('created_at')->paginate(20);
    }
}
