<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;

// Admin Routes
Route::prefix("admin")->group(function () {
    Route::get("/", [HomeController::class, 'index'])->name('home');
});
