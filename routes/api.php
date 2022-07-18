<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ChartApiController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->namespace('Api') ->prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
   
});

// APIIII

Route::middleware('jwt.verify:user')->prefix('v1')->group(function () {
    Route::get('/subtotal', [ChartApiController::class, 'get_subtotal']);
    Route::get('/chart', [ChartApiController::class, 'index']);
    Route::post('/update', [ChartApiController::class, 'update']);
    Route::delete('/destroy', [ChartApiController::class, 'destroy']);

});