<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('login', [LoginController::class, 'showFormLogin'])->name('admin.login');
Route::post('login', [LoginController::class, 'login']);
Route::middleware('auth:admin')->group(function (){
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');
    Route::resource('admins',AdminController::class)->names('admins');
});
