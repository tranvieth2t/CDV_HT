<?php

namespace App\Services\Client;

use App\Enums\AdminRole;
use App\Enums\Community;
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

    public function getListNewHotChildCommunity($perPage = 12, $condition = [])
    {
        return $this->repository->getListNewHotChildCommunity();
//            ->where('verify', NewsVerify::VERIFY)
//            ->where('hot', NewsHot::HOT)
//            ->where('community_id', '>', Community::VHT)
//            ->with('community')
//            ->orderBy('created_at')
//            ->limit($perPage)->get();
    }

    public function getListNewsParentCommunity()
    {
        return $this->repository
            ->where('verify', NewsVerify::VERIFY)
            ->with('community')
            ->orderByDesc('created_at')
            ->where('community_id', Community::VHT)
            ->limit(15)->get();
    }

    public function findNews($id)
    {
        $news = $this->repository->with('community')->find($id);
        if ($news->verify == NewsVerify::VERIFY || Auth::guard('admin')->user()) {
            return $news;
        }
        return abort(404);

    }

    public function getListNewsCommunity($community_id)
    {
        return $this->repository
            ->where('community_id', $community_id)
            ->where('verify', NewsVerify::VERIFY)
            ->orderBy('created_at')
            ->with('community')
            ->paginate(10);
    }
}
