<?php

namespace App\Services\Client;

use App\Enums\NotifyVerify;
use App\Interfaces\NotifyRepository;
use App\Services\BaseService;

class NotifyServices extends BaseService
{
    protected $repository;

    public function __construct(NotifyRepository $repository)
    {
        $this->repository = $repository;
    }


    public function getListNotify()
    {
        return $this->repository
            ->where('verify', NotifyVerify::VERIFY)
            ->orderByDesc('created_at')
            ->limit(10)->get();
    }
}
