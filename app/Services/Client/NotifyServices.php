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
            ->paginate(9);
    }

    public function findNotify($id)
    {
        $notify = $this->repository->with('community')->find($id);
        if ($notify->verify == NotifyVerify::VERIFY || Auth::guard('admin')->user()) {
            return $notify;
        }
        return abort(404);
    }
}
