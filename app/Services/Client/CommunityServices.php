<?php

namespace App\Services\Client;

use App\Enums\AdminRole;
use App\Interfaces\CommunityRepository;
use App\Services\BaseService;
use Illuminate\Support\Facades\Auth;

class CommunityServices extends BaseService
{
    protected $repository;
    public function __construct(CommunityRepository $communityRepository)
    {
        $this->repository = $communityRepository;
    }

    public function getListCommunity() {
        return $this->repository->pluck('name', 'id');
    }

    public function getListCommunityByRoleAdmin() {
        $admin = Auth::guard('admin')->user();
        $query = $this->repository;
        if ($admin->role_admin == AdminRole::EDITS) {
            $query = $query->where('id', $admin->community_id);
        }
        return $query
            ->pluck('name', 'id');
    }
}
