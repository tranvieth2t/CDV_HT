<?php

namespace App\Services\Admin;

use App\Enums\AdminRole;
use App\Interfaces\NewsRepository;
use App\Services\BaseService;
use Illuminate\Support\Facades\Auth;

class NewsServices extends BaseService
{
    protected $repository;
    public function __construct(NewsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getListNews($perPage = null, $condition = [])
    {
        return $this->repository->getListNews($perPage, $condition);
    }
    public function createNews($params, $thumbnail = null) {
        $params['thumbnail'] = $thumbnail;
        $params['created_by'] = Auth::guard('admin')->user()->id;
        return $this->repository->create($params);
    }
}
