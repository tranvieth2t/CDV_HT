<?php

namespace App\Http\Controllers\Admin;

use App\Enums\NewsVerify;
use App\Enums\VocationVerify;
use App\Http\Controllers\Controller;
use App\Services\Admin\CommunityServices;
use App\Services\Admin\VocationServices;
use App\Services\S3Service;
use Illuminate\Support\Facades\Auth;
use App\Enums\AdminRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\Admin\StoreVocationRequest;
use mysql_xdevapi\Exception;

class VocationController extends Controller
{
    protected $vocationService;
    protected $communityServices;

    public function __construct(
        VocationServices $vocationServices,
        CommunityServices $communityServices
    ) {
        $this->vocationService = $vocationServices;
        $this->communityServices = $communityServices;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listVocation = $this->vocationService->getListVocation();
        return view('admin.vocation.index', ['listVocation' => $listVocation]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $listCommunityByRoleAdmin = $this->communityServices->getListCommunityByRoleAdmin();
        return view('admin.vocation.create',
            ['listCommunity' => $listCommunityByRoleAdmin]);
    }

    /**
     * @param StoreVocationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function store(StoreVocationRequest $request)
    {
        try {
            DB::beginTransaction();
            $this->vocationService->createVocation($request);
            session()->flash('success', trans('message.admin.vocation.createdSuccess'));
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            Log::info($exception);
            return redirect()->route('404');
        }
        return redirect()->route('vocation.index');
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vocation = $this->vocationService->find($id);
        $listCommunityByRoleAdmin = $this->communityServices->getListCommunityByRoleAdmin();
        return view('admin.vocation.edit', [
            'vocation' => $vocation,
            'listCommunity' => $listCommunityByRoleAdmin,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreVocationRequest $request, $id)
    {
        $this->vocationService->update($request, $id);
        return redirect()->route('vocation.index');
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
                'data' => trans('message.admin.vocation.deletedError'),
            ], 500);
        }
        if (Auth::guard('admin')->user()->role_admin > AdminRole::ADMIN) {
            return response()->json([
                'code' => 500,
                'message' => trans('message.admin.vocation.deletedError'),
            ], 500);
        }
        $this->vocationService->delete($id);
        return response()->json([
            'code' => 200,
            'message' => trans('message.admin.vocation.deleteSuccess'),
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
            $vocation = $this->vocationService->findByField('id', $id)->first();
            $param = $vocation->verify == VocationVerify::NOT_VERIFY ? VocationVerify::VERIFY : VocationVerify::NOT_VERIFY;
            $vocation->update(['verify' => $param]);
            session()->flash('success', trans('message.admin.vocation.verifySuccess'));
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
