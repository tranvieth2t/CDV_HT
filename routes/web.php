<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\NewsController;
use App\Http\Controllers\Client\CommunityController;

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
//Community
Route::resource('community', CommunityController::class)->names('clients.community');
