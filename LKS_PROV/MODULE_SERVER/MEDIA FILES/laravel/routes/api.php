<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\OrderController;


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

Route::prefix('v1')->group(function () {
    Route::get('/users-list', [AuthController::class, 'getUsersList']); // it's to testing
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::middleware('auth:api')->group(function() { 
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::apiResource('/buses', BusController::class);
        Route::apiResource('/drivers', DriverController::class);
        Route::match(['get', 'post'], '/orders/test', [OrderController::class, 'test']);
        Route::apiResource('/orders', OrderController::class);
    });
});