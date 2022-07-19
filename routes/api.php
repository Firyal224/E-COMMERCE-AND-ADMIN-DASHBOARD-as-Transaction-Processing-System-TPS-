<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ChartApiController;
use App\Http\Controllers\Api\ShopApiController;
use App\Http\Controllers\Api\CheckoutApiController;
use App\Http\Controllers\Api\ReceiptApiController;
use App\Http\Controllers\Api\ListOrderApiController;
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
Route::get('/loaddata', [ShopApiController::class, 'product']);
Route::get('/show-detail/{id}', [ShopApiController::class, 'show']);

Route::middleware('jwt.verify:user')->prefix('v1')->group(function () {
    Route::post('/add-chart', [ShopApiController::class, 'add_chart']);
    Route::get('/get-chart', [ShopApiController::class, 'get_chart']);

    Route::get('/data-chart', [ChartApiController::class, 'datatable_chart']);
    Route::get('/subtotal', [ChartApiController::class, 'get_subtotal']);
    Route::delete('/delete/{id}', [ChartApiController::class, 'destroy']);
    Route::post('/update', [ChartApiController::class, 'update']);

    Route::post('/order', [CheckoutApiController::class, 'store']);
    Route::post('/upload-pembayaran', [ReceiptApiController::class, 'store']);
    Route::get('/data-list-order', [ListOrderApiController::class, 'datatable_orders']);

});