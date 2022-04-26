<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\CommunityController;
use Illuminate\Support\Facades\Route;

Route::get('404', function () {
    return view('admin.404');
})->name('404');
// Login
Route::get('/login', [LoginController::class, 'showFormLogin'])->name('admin.login');
Route::post('/login', [LoginController::class, 'login']);
////User
//Route::get('/user',[UserController::class, 'showUser'])->name('admin.user');

// Register
Route::post('/register',[AdminController::class, 'updateRegister'])->name('admin.update-register');

// Verify add Admin
Route::get('/verify-admin', [AdminController::class, 'verifyAddAdmin']);

Route::middleware('auth:admin')->group(function (){
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');
    Route::get('/resetPassword',[AdminController::class, 'resetPassWord']) ->name('admin.resetPassword');
    Route::post('/resetPassword/{id}',[AdminController::class,'resetPass'])->name('admin.update-password');
    Route::get('/updateProfile',[AdminController::class, 'updateProfile'])->name('admin.updateProfile');
    Route::post('/updatePro/{id}',[AdminController::class, 'updatePro'])->name('admin.updatePro');
    Route::resource('admins', AdminController::class)->names('admins');
    //News
    Route::resource('/news', NewsController::class)->names('news');
    //Community
    Route::resource('/community', CommunityController::class)->names('community');


    Route::get('/news/{id}/show',[NewsController::class,'show']) ->name('news.show');
    Route::get('/news/{id}/verify', [NewsController::class,'verify']) ->name('news.verify');
    Route::get('/news/{id}/setNews', [NewsController::class,'hot_news']) ->name('news.setNews');
    Route::post('/news/{id}/wait', [NewsController::class,'wait']) ->name('news.wait');
});
