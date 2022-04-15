<?php

namespace App\Http\Controllers\Admin;

use App\Enums\AdminVerify;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAdminRequest;
use App\Services\Admin\AdminServices;
use App\Services\Admin\CommunityServices;
use App\Services\MailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use mysql_xdevapi\Exception;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $adminService;
    protected $mailService;
    protected $communityService;

    public function __construct(
        AdminServices     $adminService,
        MailService       $mailService,
        CommunityServices $communityServices
    )
    {
        $this->adminService = $adminService;
        $this->communityService = $communityServices;
        $this->mailService = $mailService;
    }

    public function index(Request $request)
    {
        $per_page = $request->per_page ? $request->per_page : config('constants.per_page_default');
        $listAdmin = $this->adminService->getAllAdmin($per_page);
        $listCommunity = $this->communityService->getListCommunityByRoleAdmin();
        return view('admin.admins.index', [
            'admins' => $listAdmin,
            'communities' => $listCommunity
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admins.creat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminRequest $request)
    {
        try {
            DB::beginTransaction();
            $param = $request->all();
            $param['verify'] = AdminVerify::NOT_VERIFY;
            $param['password'] = generatePassword();
            $param['verify_token'] = Str::random(60);
            $this->adminService->create($param);
            $this->mailService->sendMailAddAdmin($param);
            DB::commit();
            return redirect()->route('admins.index');
        } catch (Exception $exception) {
            DB::rollBack();
            Log::info($exception);
            return route('admins.index');
        }

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
        dd($request);
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

    public function verifyAddAdmin(Request $request)
    {
        try {
            $data = [
                'token' => $request->token
            ];
            $findAdmin = $this->adminService->findByField('verify_token', $data['token'])->first();
            if (!empty($findAdmin)) {
                return view('admin.auth.register')->with('admin', $findAdmin);
            }
            return redirect()->route('404');
        } catch (Exception $exception) {
            Log::info($exception);
            return redirect()->route('404');
        }
    }

    public function updateRegister(Request $request)
    {
        $admin = $this->adminService
            ->findByField('email', $request->email)
            ->where('verify_token', $request->verify_token)->first();
        if (!$admin) return route('404');

        try {
            DB::beginTransaction();
            $param = $request->only('password');
            $param['verify_token'] = null;
            $param['verify'] = AdminVerify::VERIFY;
            $admin->update($param);
            DB::commit();
            return redirect()->route('admins.index');
        } catch (Exception $exception) {
            Log::info($exception);
            return redirect()->route('404');
            DB::rollBack();
        }
    }
}
