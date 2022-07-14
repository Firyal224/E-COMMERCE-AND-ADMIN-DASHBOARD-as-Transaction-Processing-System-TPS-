<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
// use App\Http\Controllers\Api\AdminApiController;
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

// Route::middleware('jwt.verify:admin')->prefix('v1')->group(function () {
//     Route::post('/admin/store', [AdminApiController::class, 'store']);
//     Route::get('/edit/{id}', [AdminApiController::class, 'edit']);
//     Route::get('/upload/artikel', [AdminApiController::class, 'data_table']);
//     Route::delete('/admin/delete/{id}', [AdminApiController::class, 'destroy']);
// });