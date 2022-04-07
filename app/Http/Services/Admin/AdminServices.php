<?php

namespace App\Http\Services\Admin;
use App\Models\Admin;

class AdminServices
{
    protected $model;
    public function __construct(Admin $admin)
    {
        $this->model = $admin;
    }

    /**
     * @return Admin
     */
    public function getAllAdmin($per_page)
    {
        return $this->model
            ->with('adminRole')
            ->paginate($per_page);
    }

}
