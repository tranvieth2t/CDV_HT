<?php

namespace App\Http\Controllers\Admin;

use App\Enums\NewsHot;
use App\Enums\NewsVerify;
use App\Http\Controllers\Controller;
use App\Services\Admin\AdminServices;
use App\Services\Admin\CommunityServices;
use App\Services\Admin\NewsServices;
use App\Http\Requests\Admin\StoreNewsRequest;
use App\Http\Requests\Admin\UpdateNewsRequest;
use App\Services\MailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;

class NewsController extends Controller
{
    protected $newsServices;
    protected $adminServices;
    protected $communityServices;
    protected $mailServices;

    public function __construct(
        NewsServices      $newsServices,
        AdminServices     $adminServices,
        CommunityServices $communityServices,
        MailService       $mailService
    )
    {
        $this->newsServices = $newsServices;
        $this->adminServices = $adminServices;
        $this->communityServices = $communityServices;
        $this->mailServices = $mailService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $listNews = $this->newsServices->getListNews(null, $request->all());
        $listCommunityByRoleAdmin = $this->communityServices->getListCommunityByRoleAdmin();
        return view('admin.news.index', [
            'listCommunity' => $listCommunityByRoleAdmin,
            'listNews' => $listNews
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listAdminCensor = $this->adminServices->getAdminCensor();
        $listCommunityByRoleAdmin = $this->communityServices->getListCommunityByRoleAdmin();
        return view('admin.news.create',
            ['listCommunity' => $listCommunityByRoleAdmin, 'adminCensors' => $listAdminCensor]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request)
    {
        try {
            $news = $this->newsServices->createNews($request);
//            $this->mailServices->sendMaiLNews($news);
        } catch (Exception $exception) {
            DB::rollBack();
            Log::info($exception);
        }
        return redirect()->route('news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = $this->newsServices->find($id);
        $listAdminCensor = $this->adminServices->getAdminCensor();
        $listCommunityByRoleAdmin = $this->communityServices->getListCommunityByRoleAdmin();
        return view('admin.news.edit', [
            'news' => $news,
            'listCommunity' => $listCommunityByRoleAdmin,
            'adminCensors' => $listAdminCensor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $this->newsServices->find($id)->update($request->all());
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            Log::info($exception);
        }
        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function verify($id)
    {
        $new = $this->newsServices->findByField('id', $id)->first();
        $param = $new->verify == NewsVerify::NOT_VERIFY ? NewsVerify::VERIFY : NewsVerify::NOT_VERIFY;
        $new->update(['verify' => $param]);
        return redirect()->route('news.index');
    }
    public function hot_news($id){
        $new = $this->newsServices->findByField('id',$id)->first();
        $param = $new->hot == NewsHot::NO_HOT ? NewsHot::HOT : NewsHot::NO_HOT;
        $new->update(['hot' => $param]);
        return redirect()->route('news.index');

    }

}
