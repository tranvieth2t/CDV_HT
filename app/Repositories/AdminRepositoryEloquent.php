<?php

namespace App\Repositories;

use App\Enums\AdminRole;
use App\Enums\AdminVerify;
use App\Models\Admin;

use Illuminate\Support\Facades\Auth;
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

        $admin = Auth::guard('admin')->user();

        $query = $this->model->query();
        if($admin->role_admin != AdminRole::SUPPER_ADMIN){
            $query = $query->where('community_id', $admin->community_id);
        }
        return $query
            ->when(!empty($condition), function ($query) use ($condition) {
                return $query->where([$condition]);
            })
            ->with('adminRole', 'community')
            ->orderByDesc('id')
            ->paginate($perPage, $columns);
    }

    public function getAdminCensor()
    {
        return $this->model->query()
            ->where('verify', AdminVerify::VERIFY)
            ->where('role_admin', AdminRole::ADMIN)->pluck('name', 'id');
    }
}
