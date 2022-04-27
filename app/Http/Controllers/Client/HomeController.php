<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\Client\CommunityServices;
use App\Services\Client\NewsServices;
use function view;

class HomeController extends Controller
{
    protected $newsServices;

    protected $communityServices;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(NewsServices $newsServices, CommunityServices $communityServices)
    {
        $this->newsServices = $newsServices;
        $this->communityServices = $communityServices;
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
        return view('clients.index', ['listHotNews' => $listNewHot , 'listHotNewsParentCommunity'=> $listHotNewsParentCommunity ]);
    }
}
