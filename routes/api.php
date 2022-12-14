<?php

use App\Http\Controllers\Api\V1\LoginController;
use App\Http\Controllers\Api\V1\LogoutController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::controller(UserController::class)->prefix('users')->group(function () {
	Route::post('', 'store');
});

Route::controller(LoginController::class)->prefix('login')->group(function () {
	Route::post('', 'store');
});

Route::middleware('auth:sanctum')->group(function () {
	
	Route::controller(UserController::class)->prefix('user')->group(function () {
		Route::get('', 'show');
	});
	
	Route::post('logout', [LogoutController::class, 'store']);
	
});