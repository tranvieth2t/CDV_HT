<?php

use Illuminate\Support\Facades\Route;

// Admin Routes
Route::prefix("admin")->group(function () {
    Route::get("/", function () {
        return "Trang Login";
    });

});
