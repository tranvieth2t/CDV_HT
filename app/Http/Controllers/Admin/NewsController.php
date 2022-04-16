<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\AdminServices;
use App\Services\Admin\CommunityServices;
use App\Services\Admin\NewsServices;
use App\Http\Requests\Admin\StoreNewsRequest;
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

    public function __construct(
        NewsServices $newsServices,
        AdminServices $adminServices,
        CommunityServices $communityServices)
    {
        $this->newsServices = $newsServices;
        $this->adminServices = $adminServices;
        $this->communityServices = $communityServices;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listNews = $this->newsServices->getListNews();
        return view('admin.news.index', ['listNews' => $listNews]);
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
        return view('admin.news.create', ['listCommunity' => $listCommunityByRoleAdmin, 'adminCensors' => $listAdminCensor]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request)
    {
        $params = $request->all();
        $request->merge(['created_by' => Auth::guard('admin')->user()->id]);
        $params['created_by'] = Auth::guard('admin')->user()->id;
        try {
            DB::beginTransaction();
            $this->newsServices->store($params);
            DB::commit();
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
        $news = $this->newsServices->show($id);
        return view('admin.news.create', ['news' => $news]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
