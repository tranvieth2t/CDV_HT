<?php

namespace App\Services\Client;

use App\Enums\BannerVerify;
use App\Interfaces\BannerRepository;
use App\Services\BaseService;
use Illuminate\Support\Facades\Auth;

class BannerServices extends BaseService
{
    protected $repository;

    public function __construct(BannerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getListBanner()
    {
        return $this->repository
            ->where('verify', BannerVerify::VERIFY)
            ->orderByDesc('start_date')
            ->limit(5)
            ->get();
    }
}
