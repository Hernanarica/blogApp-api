<?php

use App\Http\Controllers\Api\V1\CommentController;
use App\Http\Controllers\Api\V1\ImageTextEditorController;
use App\Http\Controllers\Api\V1\LoginController;
use App\Http\Controllers\Api\V1\LogoutController;
use App\Http\Controllers\Api\V1\PostController;
use App\Http\Controllers\Api\V1\UserController;
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

//Route::controller(UserController::class)->prefix('users')->group(function () {
//	Route::post('', 'store')->middleware('cors');
//});

Route::post('users', [UserController::class, 'store'])->middleware('cors');

Route::controller(LoginController::class)->prefix('login')->group(function () {
	Route::post('', 'store');
});

Route::middleware('auth:sanctum')->group(function () {
	
	Route::controller(UserController::class)->prefix('user')->group(function () {
		Route::get('', 'show');
	});
	
	Route::post('logout', [LogoutController::class, 'store']);
	
	Route::controller(CommentController::class)->prefix('comments')->group(function () {
		Route::post('', 'store');
	});
	
});

Route::controller(PostController::class)->prefix('posts')->group(function () {
	Route::get('', 'index');
	Route::post('', 'store');
	Route::get('/{post:title}', 'show');
});

Route::post('images', [ImageTextEditorController::class, 'store'])->middleware('cors');