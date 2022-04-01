<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function showFormLogin() {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        $isRemember =  $request->remember ? true : false;
        if (Auth::guard('admin')->attempt($credentials, $isRemember)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login');
    }
}
