<?php

namespace App\Services\Client;

use App\Enums\VocationVerify;
use App\Interfaces\VocationRepository;
use App\Services\BaseService;

class VocationServices extends BaseService
{
    protected $repository;

    public function __construct(VocationRepository $repository)
    {
        $this->repository = $repository;
    }


    public function getListVocation($number = 4)
    {
        return $this->repository
            ->with('community')
            ->where('verify', VocationVerify::VERIFY)
            ->orderByDesc('created_at')
            ->paginate($number);
    }

    public function findVocation($id)
    {
        $notify = $this->repository->with('community')->find($id);
        if ($notify->verify == VocationVerify::VERIFY || Auth::guard('admin')->user()) {
            return $notify;
        }
        return abort(404);
    }
}
