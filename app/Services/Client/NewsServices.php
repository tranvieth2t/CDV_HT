<?php

namespace App\Services\Client;

use App\Enums\AdminRole;
use App\Enums\NewsHot;
use App\Enums\NewsVerify;
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

    public function getListNewHot($perPage = null, $condition = [])
    {
        return $this->repository->limit(10);

    }
    public function createNews($request) {
        $params = $request->all();
        $request->merge(['created_by' => Auth::guard('admin')->user()->id]);
        $params['created_by'] = Auth::guard('admin')->user()->id;
        return $this->repository->create($params);
    }
    public function getListHotNewsCommunity($community_id) {
        return $this->repository->findWhere([
            'community_id' => $community_id,
            'verify' => NewsVerify::VERIFY
        ]);
    }
}
