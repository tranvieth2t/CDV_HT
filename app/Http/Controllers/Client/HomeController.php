<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\Client\NewsServices;
use function view;

class HomeController extends Controller
{
    protected $newsServices;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(NewsServices $newsServices)
    {
        $this->newsServices = $newsServices;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
//    public function index()
//    {
//        $listHotNews = $this->newsServices->getListHotNews();
//        return view('clients.index', ['listHotNews' => $listHotNews ]);
//    }
    public function index()
    {
        $listNewHot = $this->newsServices->getListNewHot();
        return view('clients.index', ['listHotNews' => $listNewHot ]);
    }
}
