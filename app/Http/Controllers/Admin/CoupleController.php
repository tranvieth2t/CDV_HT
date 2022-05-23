<?php

namespace App\Http\Controllers\Admin;


use App\Enums\CoupleVerify;
use App\Http\Controllers\Controller;
use App\Services\Admin\CommunityServices;
use App\Services\Admin\CoupleServices;
use App\Http\Requests\Admin\StoreCoupleRequest;
use Illuminate\Support\Facades\Auth;
use App\Enums\AdminRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CoupleController extends Controller
{
    protected $coupleService;
    protected $communityServices;

    public function __construct(
        CoupleServices $coupleServices,
        CommunityServices $communityServices
    ) {
        $this->coupleService = $coupleServices;
        $this->communityServices = $communityServices;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $listCouple = $this->coupleService->getListCouple();
        $listCommunity = $this->communityServices->getListCommunity();
        return view('admin.couple.index', [
            'listCouple' => $listCouple,
            'listCommunity' => $listCommunity,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $listCommunityByRoleAdmin = $this->communityServices->getListCommunityByRoleAdmin();
        return view('admin.couple.create',
            ['listCommunity' => $listCommunityByRoleAdmin]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function store(StoreCoupleRequest $request)
    {
        try {
            DB::beginTransaction();
            $this->coupleService->createCouple($request);
            session()->flash('success', trans('message.admin.couple.createdSuccess'));
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            Log::info($exception);
            return redirect()->route('404');
        }
        return redirect()->route('couple.index');
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
        $couple = $this->coupleService->find($id);
        $listCommunityByRoleAdmin = $this->communityServices->getListCommunityByRoleAdmin();
        return view('admin.couple.edit', [
            'couple' => $couple,
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
    public function update(StoreCoupleRequest $request, $id)
    {
        $this->coupleService->update($request, $id);
        return redirect()->route('couple.index');
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
                'data' => trans('message.admin.couple.deletedError'),
            ], 500);
        }
        if (Auth::guard('admin')->user()->role_admin > AdminRole::ADMIN) {
            return response()->json([
                'code' => 500,
                'message' => trans('message.admin.couple.deletedError'),
            ], 500);
        }
        $this->coupleService->delete($id);
        return response()->json([
            'code' => 200,
            'message' => trans('message.admin.couple.deleteSuccess'),
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
            $couple = $this->coupleService->findByField('id', $id)->first();
            $param = $couple->verify == CoupleVerify::NOT_VERIFY ? CoupleVerify::VERIFY : CoupleVerify::NOT_VERIFY;
            $couple->update(['verify' => $param]);
            session()->flash('success', trans('message.admin.couple.verifySuccess'));
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
