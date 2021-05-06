<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserLoginController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('login',[UserLoginController::class,'index'])->name('user.login');
Route::post('login',[UserLoginController::class,'authenticate'])->name('user.authenticate');
Route::get('logout', [UserLoginController::class,'destroy'])->name('user.logout');
