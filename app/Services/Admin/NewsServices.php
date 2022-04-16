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

    public function getListNews($perPage = null, $condition = [], $columns = ['*'])
    {
        return $this->repository->getListNews($perPage, $condition, $columns);
    }
}
