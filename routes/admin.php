<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminMediaController;
use App\Http\Controllers\Admin\UserRoleManagementController;
use App\Http\Controllers\Admin\UserManagementController;

Route::get('/', [AdminDashboardController::class,'index'])->name('dashboard.index');
Route::resource('settings',AdminSettingController::class);
Route::resource('media',AdminMediaController::class);
Route::resource('role-management',UserRoleManagementController::class);
Route::resource('user-management',UserManagementController::class);
