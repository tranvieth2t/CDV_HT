<?php

namespace App\Repositories;

use App\Interfaces\VocationRepository;
use Prettus\Repository\Eloquent\BaseRepository;
use App\Models\Vocation;

/**
 * Class AdminRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class VocationRepositoryEloquent extends BaseRepository implements VocationRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Vocation::class;
    }

    /**
     * @param $perPage
     * @param $condition
     * @param $columns
     * @return mixed
     */

    public function getListVocation($perPage, $conditions = [], $columns = ['*'])
    {
        return $this->model
            ->with('admin', 'community')
            ->orderByDesc('created_at')->paginate(20);
    }
}
