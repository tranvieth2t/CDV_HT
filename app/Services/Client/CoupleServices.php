<?php

namespace App\Services\Client;

use App\Enums\CoupleVerify;
use App\Interfaces\CoupleRepository;
use App\Services\BaseService;

class CoupleServices extends BaseService
{
    protected $repository;

    public function __construct(CoupleRepository $repository)
    {
        $this->repository = $repository;
    }


    public function getListCouple($number = 4)
    {
        return $this->repository
            ->where('verify', CoupleVerify::VERIFY)
            ->with(['communityMale', 'communityFemale'])
            ->orderByDesc('created_at')
            ->paginate($number);
    }

    public function findCouple($id)
    {
        $couple = $this->repository->with(['communityMale', 'communityFemale'])->find($id);
        if ($couple->verify == CoupleVerify::VERIFY || Auth::guard('admin')->user()) {
            return $couple;
        }
        return abort(404);
    }
}
