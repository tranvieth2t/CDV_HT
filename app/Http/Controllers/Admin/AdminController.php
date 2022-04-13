<?php

namespace App\Http\Controllers\Admin;

use App\Enums\AdminVerify;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAdminRequest;
use App\Services\Admin\AdminServices;
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

    public function __construct(AdminServices $adminService, MailService $mailService) {
       $this->adminService = $adminService;
       $this->mailService = $mailService ;
    }
    public function index(Request $request)
    {
        $per_page = $request->per_page ? $request->per_page : config('constants.per_page_default');
        $listAdmin = $this->adminService->getAllAdmin($per_page);
        return view('admin.admins.index',[
            'admins' => $listAdmin,
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminRequest $request)
    {
        try {
//            dd($request->all());
            DB::beginTransaction();
            $param = $request->all();
            $param['verify'] = AdminVerify::NOT_VERIFY;
            $param['password'] = generatePassword();
            $param['verify_token'] = Str::random(60);
            $this->adminService->store($param);
            //$this->mailService->sendMailAddAdmin($param);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function verifyAddAdmin(Request  $request) {
        try {
            $data = [
                'token' => $request->token
            ];
            $findAdmin = $this->adminService->findByField('verify_token', $data['token'])->first();
            if (!empty($findAdmin)) {
//                $dataUpdate['verify_token'] = null;
//                $dataUpdate['verify'] = AdminVerify::VERIFY;
//                $findAdmin->update($dataUpdate);
                return redirect()->route('admin.register');
            }
            return redirect()->route('404');
        } catch (Exception $exception) {
            Log::info($exception);
            return redirect()->route('404');
        }
    }
}
