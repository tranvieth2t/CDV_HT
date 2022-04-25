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

    public function getListNewHot($perPage = 10, $condition = [])
    {
       return $this->repository
            ->where('verify', NewsVerify::VERIFY)
            ->where('hot', NewsHot::HOT)
            ->with('community')->limit($perPage)->get();
    }

    public function findNews($id)
    {
        $news = $this->repository->with('community')->find($id);
        if ($news->verify != NewsVerify::VERIFY) {
            return abort(404);
        }
        return $news;
    }

    public function getListHotNewsCommunity($community_id)
    {
        return $this->repository->findWhere([
            'community_id' => $community_id,
            'verify' => NewsVerify::VERIFY
        ]);
    }
}
