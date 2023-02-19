<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
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

Route::group(['prefix' => 'v1', 'as' => 'v1.', 'namespace' => 'App\Http\Controllers\Api\V1', 'middleware' => ['auth:sanctum']], function () {
    Route::apiResource('posts', PostController::class);
});


Route::post('/auth/login', [UserController::class, 'login']);
