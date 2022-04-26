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

    public function getListNewHot($perPage = 9, $condition = [])
    {
       return $this->repository
            ->where('verify', NewsVerify::VERIFY)
            ->where('hot', NewsHot::HOT)
           ->where('community_id','!=', Community::VHT)
            ->with('community')->limit($perPage)->get();
    }

    public function getListNewsParentCommunity(){
          return $this->repository
              -> where('verify', NewsVerify::VERIFY)
              -> where('hot', NewsHot::HOT)
              -> where('community_id',Community::VHT )->get();
    }

    public function findNews($id)
    {
        $news = $this->repository->with('community')->find($id);
        if ($news->verify != NewsVerify::VERIFY) {
            return abort(404);
        }
        return $news;
    }

    public function getListNewsCommunity($community_id)
    {
        return $this->repository->Where(
            'community_id',$community_id)
           ->where( 'verify' , NewsVerify::VERIFY
        )->paginate(10);
    }
//return $this->repository->Where([
//'community_id' => $community_id,
//'verify' => NewsVerify::VERIFY
//]);
}
