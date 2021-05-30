<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserLoginController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/users/{address}', [UserLoginController::class, 'userExsists']);
Route::post('/users', [UserLoginController::class, 'authenticate']);
Route::get('/logout', [UserLoginController::class, 'logout']);
Route::group(['middleware' => ['jwt.verify']], function() {
	
	
});

