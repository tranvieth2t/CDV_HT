<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CoupleController;
use App\Http\Controllers\Admin\VocationController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\CommunityController;
use App\Http\Controllers\Admin\NotifyController;
use App\Http\Controllers\Admin\BannerController;
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
    Route::post('/updatePro/{id}',[AdminController::class, 'updatePro'])->name('admin.updatePro');
    Route::resource('admins', AdminController::class)->names('admins');
    //News
    Route::resource('/news', NewsController::class)->names('news');
    Route::get('/convert_news', [NewsController::class, 'convertNews'])->name('convert_news');
    Route::get('/convert_notify', [NotifyController::class, 'convertNotify'])->name('convert_notify');
    Route::get('/news-verify', [NewsController::class, 'newsNotVerify'])->name('news-verify');
    Route::get('/news/{id}/show',[NewsController::class,'show']) ->name('news.show');
    Route::get('/news/{id}/verify', [NewsController::class,'verify']) ->name('news.verify');
    Route::get('/news/{id}/setNews', [NewsController::class,'hot_news']) ->name('news.setNews');
    Route::post('/news/{id}/wait', [NewsController::class,'wait']) ->name('news.wait');
    //Community
    Route::resource('/community', CommunityController::class)->names('community');
    //Notify
    Route::resource('/notify', NotifyController::class)->names('notify');
    Route::get('/notify/{id}/verify', [NotifyController::class,'verify']) ->name('notify.verify');
    //Banner
    Route::resource('/banner', BannerController::class)->names('banner');
    Route::get('/banner/{id}/verify', [BannerController::class,'verify']) ->name('banner.verify');

    Route::resource('/couple', CoupleController::class)->names('couple');
    Route::get('/couple/{id}/verify', [CoupleController::class,'verify']) ->name('couple.verify');

    Route::resource('/vocation', VocationController::class)->names('vocation');
    Route::get('/vocation/{id}/verify', [VocationController::class,'verify']) ->name('vocation.verify');
});
