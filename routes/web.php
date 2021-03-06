<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\NewsController;
use App\Http\Controllers\Client\CommunityController;
use App\Http\Controllers\Client\NotifyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('', [HomeController::class,'index'])->name('home');
Route::get('/404', function () {
    return view('clients.404');
})->name('clients.404');

//News
Route::resource('news', NewsController::class)->names('clients.news');
Route::resource('notify', NotifyController::class)->names('clients.notify');
Route::resource('couple', \App\Http\Controllers\Client\CoupleController::class)->names('clients.couple');
Route::resource('vocation', \App\Http\Controllers\Client\VocationController::class)->names('clients.vocation');
Route::get('news/community/{id}', [NewsController::class, "getListNewsCommunity"])->name('clients.news.community');
//Community
Route::resource('community', CommunityController::class)->names('clients.community');

//login
Route::get('/login',[\App\Http\Controllers\Admin\Auth\LoginController::class,'show'])->name('auth.login');
//register
Route::get('/register',[\App\Http\Controllers\Admin\Auth\LoginController::class,'showRegister'])->name('auth.register');

