<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\Client\BannerServices;
use App\Services\Client\CommunityServices;
use App\Services\Client\CoupleServices;
use App\Services\Client\NewsServices;
use App\Services\Client\NotifyServices;
use App\Services\Client\VocationServices;
use function view;

class HomeController extends Controller
{
    protected $newsServices;

    protected $communityServices;

    protected $bannerServices;
    protected $notifyServices;
    protected $coupleServices;
    protected $vocationServices;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        NewsServices $newsServices,
        CommunityServices $communityServices,
        BannerServices $bannerServices,
        NotifyServices  $notifyServices,
        CoupleServices  $coupleServices,
        VocationServices $vocationServices
    ) {
        $this->newsServices = $newsServices;
        $this->communityServices = $communityServices;
        $this->bannerServices = $bannerServices;
        $this->notifyServices = $notifyServices;
        $this->coupleServices = $coupleServices;
        $this->vocationServices = $vocationServices;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $listNewHotChildCommunity = $this->newsServices->getListNewHotChildCommunity();
        $listNewCatholic = $this->newsServices->getListNewCatholic();
        $listHotNewsParentCommunity = $this->newsServices->getListNewsParentCommunity();
        $listBanner = $this->bannerServices->getListBanner();
        $listNotify = $this->notifyServices->getListNotify();
        $listCouple = $this->coupleServices->getListCouple();
        $listVocation = $this->vocationServices->getListVocation();
        return view('clients.index',
            [
                'listNewHotChildCommunity' => $listNewHotChildCommunity,
                'listHotNewsParentCommunity' => $listHotNewsParentCommunity,
                'listNewsCatholic' => $listNewCatholic,
                'listBanner' => $listBanner,
                'listNotify' => $listNotify,
                'listCouple' => $listCouple,
                'listVocation' => $listVocation,
            ]);
    }
}
