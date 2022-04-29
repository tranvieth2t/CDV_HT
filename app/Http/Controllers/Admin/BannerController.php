<?php

namespace App\Http\Controllers\Admin;

use App\Enums\BannerVerify;
use App\Http\Controllers\Controller;
use App\Services\Admin\BannerServices;
use Illuminate\Support\Facades\Auth;
use App\Enums\AdminRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use mysql_xdevapi\Exception;

class BannerController extends Controller
{
    protected $bannerService;

    public function __construct(
        BannerServices $bannerServices
    ) {
        $this->bannerService = $bannerServices;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listBanner = $this->bannerService->getListBanner();
        return view('admin.banner.index', ['listBanner' => $listBanner]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $this->bannerService->createBanner($request);
            session()->flash('success', trans('message.admin.banner.createdSuccess'));
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            Log::info($exception);
            return redirect()->route('404');
        }
        return redirect()->route('banner.index');
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
        $banner = $this->bannerService->find($id);
        return view('admin.banner.edit', [
            'banner' => $banner,
        ]);
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
        $this->bannerService->update($request, $id);
        return redirect()->route('banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, $id)
    {
        if (!$request->ajax()) {
            return response()->json([
                'code' => 500,
                'data' => trans('message.admin.banner.deletedError'),
            ], 500);
        }
        if (Auth::guard('admin')->user()->role_admin > AdminRole::ADMIN) {
            return response()->json([
                'code' => 500,
                'message' => trans('message.admin.banner.deletedError'),
            ], 500);
        }
        $this->bannerService->delete($id);
        return response()->json([
            'code' => 200,
            'message' => trans('message.admin.banner.deleteSuccess'),
        ]);
    }

    public function verify(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            if (!$request->ajax()) {
                return response()->json([
                    'code' => 500,
                    'data' => trans('message.admin.news.deletedError'),
                ], 500);
            }
            if (Auth::guard('admin')->user()->role_admin > AdminRole::ADMIN) {
                return response()->json([
                    'code' => 500,
                    'message' => trans('message.admin.news.deletedError'),
                ], 500);
            }
            $banner = $this->bannerService->findByField('id', $id)->first();
            $param = $banner->verify == BannerVerify::NOT_VERIFY ? BannerVerify::VERIFY : BannerVerify::NOT_VERIFY;
            $banner->update(['verify' => $param]);
            session()->flash('success', trans('message.admin.banner.verifySuccess'));
            DB::commit();
            return response()->json([
                'code' => 200,
                'message' => trans('news.verifySuccess'),
            ]);
        } catch (Exception $exception) {
            DB::rollBack();
            Log::info('verifyError', $exception);
        }
    }
}
