<?php

namespace App\Http\Controllers\Admin;

use App\Enums\AdminVerify;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CheckNameRequest;
use App\Http\Requests\Admin\CheckPassRequest;
use App\Http\Requests\Admin\StoreAdminRequest;
use App\Services\Admin\AdminServices;
use App\Services\Admin\CommunityServices;
use App\Services\MailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
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
        $listAdmin = $this->adminService->getAllAdminByRoleAdmin($per_page);
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
        //
    }

    /**
     * @param StoreAdminRequest $request
     * @return \Illuminate\Http\RedirectResponse|string
     * @throws \Throwable
     */
    public function store(StoreAdminRequest $request)
    {
        try {
            DB::beginTransaction();
            $param = $request->all();
            if ($request->community_id == 'none') {
                $param['community_id'] = null;
            };
            $param['verify'] = AdminVerify::NOT_VERIFY;
            $param['password'] = bcrypt(config('setting.password_default'));
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

    public function updateRegister(CheckPassRequest $request)
    {
        $admin = $this->adminService
            ->findWhere($request->only('email', 'verify_token'))
            ->first();
        if (!$admin) return route('404');

        try {
            DB::beginTransaction();
            $param['password'] = bcrypt($request->password);
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


    public function resetPassWord()
    {
        return view('admin.auth.resetPassword');
    }

    public function resetPass(CheckNameRequest $request, $id)
    {
        $password = $request->password;
        $params = ['password' => bcrypt($password), 'name' => $request->name];
        $this->adminService->update($params, $id);
        return redirect()->route('admin.login');
    }
    public function updateProfile(){
        return view('admin.inc.form.updateProfile');
    }

    public function updatePro(NameReqest $reqest, $id)
    {
        $params = ['name' => $reqest->name];
        $this->adminService->update($params, $id);
        return redirect()->route('admin.login');
    }
}
