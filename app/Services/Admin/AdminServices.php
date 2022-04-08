<?php

namespace App\Services\Admin;

use App\Models\Admin;
use App\Services\BaseService;

class AdminServices extends BaseService
{
    public function __construct(Admin $admin)
    {
        $this->model = $admin;
    }

    /**
     * @return Admin
     */
    public function getAllAdmin($per_page = 10)
    {
        return $this->model
            ->with('adminRole')
            ->paginate($per_page);
    }

}
