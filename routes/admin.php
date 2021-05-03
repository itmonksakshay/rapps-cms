<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminMediaController;

Route::get('/', [AdminDashboardController::class,'index']);

Route::resource('settings',AdminSettingController::class);
Route::resource('media',AdminMediaController::class);
