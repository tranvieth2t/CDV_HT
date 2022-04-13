<?php

namespace App\Services\Admin;

use App\Enums\AdminRole;
use App\Models\Admin;
use App\Services\BaseService;
use Illuminate\Support\Facades\Auth;

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
        $query = $this->model
            ->with(['adminRole', 'community']);
        $admin = Auth::guard('admin')->user();
        if ($admin->role_code == AdminRole::EDITS) {
            $query = $query->where('community_id', $admin->community_id);
        }

        return $query
            ->with(['adminRole', 'community'])
            ->orderBy('verify')
            ->orderBy('role_code')
            ->orderByDesc('id')
            ->paginate($per_page);
    }
}
