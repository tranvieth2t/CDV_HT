<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\Client\BannerServices;
use App\Services\Client\CommunityServices;
use App\Services\Client\NewsServices;
use App\Services\Client\NotifyServices;
use function view;

class HomeController extends Controller
{
    protected $newsServices;

    protected $communityServices;

    protected $bannerServices;
    protected $notifyServices;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        NewsServices $newsServices,
        CommunityServices $communityServices,
        BannerServices $bannerServices,
        NotifyServices  $notifyServices
    ) {
        $this->newsServices = $newsServices;
        $this->communityServices = $communityServices;
        $this->bannerServices = $bannerServices;
        $this->notifyServices = $notifyServices;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $listNewHot = $this->newsServices->getListNewHotChildCommunity();
        $listHotNewsParentCommunity = $this->newsServices->getListNewsParentCommunity();
        $listBanner = $this->bannerServices->getListBanner();
        $listNotify = $this->notifyServices->getListNotify();

        return view('clients.index',
            [
                'listHotNews' => $listNewHot,
                'listHotNewsParentCommunity' => $listHotNewsParentCommunity,
                'listBanner' => $listBanner,
                'listNotify' => $listNotify,
            ]);
    }
}
