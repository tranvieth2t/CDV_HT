<?php

namespace App\Repositories;

use App\Enums\AdminRole;
use App\Models\Admin;

use Prettus\Repository\Eloquent\BaseRepository;
use App\Interfaces\AdminRepository;

/**
 * Class AdminRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class AdminRepositoryEloquent extends BaseRepository implements AdminRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Admin::class;
    }

    /**
     * @param $perPage
     * @param $condition
     * @param $columns
     * @return mixed
     */

    public function getListAdmin($perPage, $condition = [], $columns = ['*'])
    {
        return $this->model->query()
            ->when(!empty($condition), function ($query) use ($condition) {
                return $query->where([$condition]);
            })
            ->orderByDesc('id')
            ->paginate($perPage, $columns);
    }

    public function getAdminCensor()
    {
        return $this->model->query()
            ->where('role_admin', AdminRole::ADMIN)->pluck('name', 'id');
    }
}
