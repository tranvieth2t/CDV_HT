<?php

namespace App\Services\Admin;

use App\Enums\AdminRole;
use App\Enums\AdminVerify;
use App\Interfaces\AdminRepository;
use App\Interfaces\CommunityRepository;
use App\Services\BaseService;
use Illuminate\Support\Facades\Auth;

class AdminServices extends BaseService
{
    protected $repository;
    protected $communityRepository;
    public function __construct(AdminRepository $repository, CommunityRepository $communityRepository)
    {
        $this->repository = $repository;
        $this->communityRepository = $communityRepository;
    }

    /**
     * @param $perPage
     * @return mixed
     */
    public function getAllAdmin($perPage = 10)
    {
        return $this->repository->getListAdmin($perPage, $condition = [], $columns = [ '*' ]);
    }

    public function getAdminCensor()
    {
        return $this->repository->getAdminCensor();
    }
}
