<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('login', [LoginController::class, 'showFormLogin'])->name('admin.login');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');
Route::middleware('auth:admin')->group(function (){
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
});
