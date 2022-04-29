<?php

namespace App\Http\Controllers\Admin;

use App\Enums\NewsVerify;
use App\Enums\NotifyVerify;
use App\Http\Controllers\Controller;
use App\Services\Admin\CommunityServices;
use App\Services\Admin\NotifyServices;
use App\Services\S3Service;
use Illuminate\Support\Facades\Auth;
use App\Enums\AdminRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use mysql_xdevapi\Exception;

class NotifyController extends Controller
{
    protected $notifyService;
    protected $communityServices;

    public function __construct(
        NotifyServices $notifyServices,
        CommunityServices $communityServices
    ) {
        $this->notifyService = $notifyServices;
        $this->communityServices = $communityServices;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listNotify = $this->notifyService->getListNotify();
        return view('admin.notify.index', ['listNotify' => $listNotify]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listCommunityByRoleAdmin = $this->communityServices->getListCommunityByRoleAdmin();
        return view('admin.notify.create',
            ['listCommunity' => $listCommunityByRoleAdmin]);
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
            $this->notifyService->createNotify($request);
            session()->flash('success', trans('message.admin.notify.createdSuccess'));
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            Log::info($exception);
            return redirect()->route('404');
        }
        return redirect()->route('notify.index');
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
        $notify = $this->notifyService->find($id);
        $listCommunityByRoleAdmin = $this->communityServices->getListCommunityByRoleAdmin();
        return view('admin.notify.edit', [
            'notify' => $notify,
            'listCommunity' => $listCommunityByRoleAdmin,
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
        $this->notifyService->update($request, $id);
        return redirect()->route('notify.index');
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
                'data' => trans('message.admin.notify.deletedError'),
            ], 500);
        }
        if (Auth::guard('admin')->user()->role_admin > AdminRole::ADMIN) {
            return response()->json([
                'code' => 500,
                'message' => trans('message.admin.notify.deletedError'),
            ], 500);
        }
        $this->notifyService->delete($id);
        return response()->json([
            'code' => 200,
            'message' => trans('message.admin.notify.deleteSuccess'),
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
            $notify = $this->notifyService->findByField('id', $id)->first();
            $param = $notify->verify == NotifyVerify::NOT_VERIFY ? NotifyVerify::VERIFY : NotifyVerify::NOT_VERIFY;
            $notify->update(['verify' => $param]);
            session()->flash('success', trans('message.admin.notify.verifySuccess'));
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
