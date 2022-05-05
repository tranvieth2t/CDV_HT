<?php

namespace App\Http\Controllers\Admin;

use App\Enums\AdminRole;
use App\Enums\NewsHot;
use App\Enums\NewsVerify;
use App\Http\Controllers\Controller;
use App\Services\Admin\AdminServices;
use App\Services\Admin\CommunityServices;
use App\Services\Admin\NewsServices;
use App\Http\Requests\Admin\StoreNewsRequest;
use App\Http\Requests\Admin\UpdateNewsRequest;
use App\Services\MailService;
use App\Services\S3Service;
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
    protected $s3Services;

    public function __construct(
        NewsServices $newsServices,
        AdminServices $adminServices,
        CommunityServices $communityServices,
        MailService $mailService,
        S3Service $s3Service
    ) {
        $this->newsServices = $newsServices;
        $this->adminServices = $adminServices;
        $this->communityServices = $communityServices;
        $this->mailServices = $mailService;
        $this->s3Services = $s3Service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $listNews = $this->newsServices->getListNews(null, $request->filter);
        $listAdminCensors = $this->adminServices->getAdminCensor();
        $listCommunityByRoleAdmin = $this->communityServices->getListCommunityByRoleAdmin();
        $filter = $request->get('filter');
        return view('admin.news.index', [
            'listAdminCensors' => $listAdminCensors,
            'listCommunity' => $listCommunityByRoleAdmin,
            'listNews' => $listNews,
            'filter' => $filter
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreNewsRequest $request)
    {
        try {
            DB::beginTransaction();
            $this->newsServices->createNews($request);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            Log::info($exception);
            return redirect()->route('404');
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
    return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = $this->newsServices->find($id);
        $listAdminCensor = $this->adminServices->getAdminCensor();
        $listCommunityByRoleAdmin = $this->communityServices->getListCommunityByRoleAdmin();
        return view('admin.news.edit', [
            'news' => $news,
            'listCommunity' => $listCommunityByRoleAdmin,
            'adminCensors' => $listAdminCensor
        ]);
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

        $this->newsServices->updateNews($request, $id);


        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request,$id)
    {
        if (!$request->ajax()) {
            return response()->json([
                'code' => 500,
                'data' => trans('message.admin.news.deletedError'),
            ] , 500);
        }
        if (Auth::guard('admin')->user()->role_admin > AdminRole::ADMIN) {
            return response()->json([
                'code'    => 500,
                'message' => trans('message.admin.news.deletedError'),
            ], 500);
        }
        $this->newsServices->delete($id);
        return response()->json([
            'code' => 200,
            'message' => trans('news.createdSuccess'),
        ]);
    }

    public function verify($id)
    {
        $new = $this->newsServices->findByField('id', $id)->first();
        $param = $new->verify == NewsVerify::NOT_VERIFY ? NewsVerify::VERIFY : NewsVerify::NOT_VERIFY;
        $new->update(['verify' => $param]);
        return redirect()->route('news.index');
    }

    public function hot_news($id)
    {
        $new = $this->newsServices->findByField('id', $id)->first();
        $param = $new->hot == NewsHot::NO_HOT ? NewsHot::HOT : NewsHot::NO_HOT;
        $new->update(['hot' => $param]);
        return redirect()->route('news.index');
    }

    public function wait(Request $request, $id)
    {
        try {
            $params = $request->only('censors');
            $params['verify'] = NewsVerify::WAIT;
            $news = $this->newsServices->update($params, $id);
            $adminRequest = Auth::guard('admin')->user();
            $this->mailServices->sendMaiLNews($news, $adminRequest, $request->note);
        } catch (Exception $exception) {
            Log::info($exception);
            return redirect()->route('404');
        }

        return redirect()->route('news.index');
    }
    public function newsNotVerify()
    {
        $listNews = $this->newsServices->getListNewsNotVerify();
        $listAdminCensors = $this->adminServices->getAdminCensor();
        $listCommunityByRoleAdmin = $this->communityServices->getListCommunityByRoleAdmin();
        return view('admin.news.new_not_verify', [
            'listAdminCensors' => $listAdminCensors,
            'listCommunity' => $listCommunityByRoleAdmin,
            'listNews' => $listNews,
        ]);
    }
}
