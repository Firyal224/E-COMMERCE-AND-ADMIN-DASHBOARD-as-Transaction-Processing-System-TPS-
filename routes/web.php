<?php


use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ChekoutController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\ListOrderController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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


Auth::routes(['verify' => true]);

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


Route::get('/cek-role', function () {
    if(auth()->user()->hasRole('admin')){
     
        return redirect('/admin');
    }else{
        
        return redirect('/');
    }

    
});

Route::get('/', [HomeController::class, 'index']);
Route::get('/shop/{id}', [ShopController::class, 'index']);
Route::post('/loaddata', [ShopController::class, 'product']);
Route::get('/show-detail/{id}', [ShopController::class, 'show']);



Route::group(['middleware' => ['verified', 'role:user']], function () {
    Route::post('/add-chart', [ShopController::class, 'add_chart']);
    Route::get('/get-chart', [ShopController::class, 'get_chart']);
    
    Route::get('/chart', [ChartController::class, 'index']);
    Route::get('/data-chart', [ChartController::class, 'datatable_chart']);
    Route::get('/subtotal', [ChartController::class, 'get_subtotal']);
    Route::delete('/delete/{id}', [ChartController::class, 'destroy']);
    Route::post('/update-chart', [ChartController::class, 'update']);

    Route::get('/chekout', [ChekoutController::class, 'index']);
    Route::post('/order', [ChekoutController::class, 'store']);

    Route::get('/receipt/{id}', [ReceiptController::class, 'index']);
    Route::post('/upload-pembayaran', [ReceiptController::class, 'store']);

    Route::get('/list-order', [ListOrderController::class, 'index']);
    Route::get('/data-list-order', [ListOrderController::class, 'datatable_orders']);
});

Route::group(['middleware' => ['verified', 'role:admin']], function () {
    Route::get('/admin', [AdminController::class, 'index']);
});




