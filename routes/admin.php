<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminMediaController;
use App\Http\Controllers\Admin\UserRoleManagementController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\AdminPostController;

Route::get('/', [AdminDashboardController::class,'index'])->name('dashboard.index');
Route::resource('settings',AdminSettingController::class);
Route::resource('media',AdminMediaController::class);
Route::resource('role-management',UserRoleManagementController::class);
Route::get('role-management/delete/{id}', [UserRoleManagementController::class, 'delete'])->name('role-management.delete');
Route::resource('user-management',UserManagementController::class);
Route::get('user-management/delete/{id}', [UserManagementController::class, 'delete'])->name('user-management.delete');
Route::resource('post',AdminPostController::class);
Route::get('post/delete/{id}', [AdminPostController::class, 'delete'])->name('post.delete');
