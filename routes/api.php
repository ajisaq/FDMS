<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/agent/login', [App\Http\Controllers\Api\AgentController::class, 'login']);
Route::post('/agent/update_password', [App\Http\Controllers\Api\AgentController::class, 'update_password']);

Route::get('/device/get_by_id', [App\Http\Controllers\Api\DeviceController::class, 'show']);
Route::get('/device/update_code', [App\Http\Controllers\Api\DeviceController::class, 'update_code']);

Route::post('/transaction/create', [App\Http\Controllers\Api\TransactionController::class, 'create']);