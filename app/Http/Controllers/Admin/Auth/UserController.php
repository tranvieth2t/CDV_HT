<?php

use App\Http\Controllers\Controller;

class UserController extends Controller{

    public function showUser(Request  $request){

        return view('admin.user');
    }

}
