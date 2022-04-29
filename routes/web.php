<?php

use App\Http\Controllers\ClusterController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\StationController;
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


// Auth routes
Auth::routes();

// Home route
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Stations routes
Route::controller(StationController::class)->group(function () {
    Route::get('/stations/list', 'index')->name('list_stations');
    Route::get('/stations/add', 'create')->name('show_add_stations');
    Route::post('/stations/add', 'store')->name('store_station');
    Route::get('/stations/{id}/info', 'show')->name('show_station_info');
    Route::get('/stations/{id}/edit', 'edit')->name('show_edit_station');
    Route::post('/stations/{id}/edit', 'update')->name('update_station_info');
    Route::post('/stations/{id}/delete', 'destroy')->name('delete_station_info');
});

// Clusters routes
Route::controller(ClusterController::class)->group(function () {
    Route::get('/clusters/list', 'index')->name('list_clusters');
    Route::get('/clusters/add', 'create')->name('show_add_cluster');
    Route::post('/clusters/add', 'store')->name('store_cluster');
    Route::get('/clusters/{id}/info', 'show')->name('show_cluster_info');
    Route::get('/clusters/{id}/edit', 'edit')->name('show_edit_cluster');
    Route::post('/clusters/{id}/edit', 'update')->name('update_cluster_info');
    Route::post('/clusters/{id}/delete', 'destroy')->name('delete_cluster_info');
});

// Pos routes
Route::controller(PosController::class)->group(function () {
    Route::get('/pos/list', 'index')->name('list_pos');
    Route::get('/pos/add', 'create')->name('show_add_pos');
    Route::post('/pos/add', 'store')->name('store_pos');
    Route::get('/pos/{id}/info', 'show')->name('show_pos_info');
    Route::get('/pos/{id}/edit', 'edit')->name('show_edit_pos');
    Route::post('/pos/{id}/edit', 'update')->name('update_pos_info');
    Route::post('/pos/{id}/delete', 'destroy')->name('delete_pos_info');
});


// Device routes
Route::controller(PosController::class)->group(function () {
    Route::get('/devices/list', 'index')->name('list_devices');
    Route::get('/devices/add', 'create')->name('show_add_device');
    Route::post('/devices/add', 'store')->name('store_device');
    Route::get('/devices/{id}/info', 'show')->name('show_device_info');
    Route::get('/devices/{id}/edit', 'edit')->name('show_edit_device');
    Route::post('/devices/{id}/edit', 'update')->name('update_device_info');
    Route::post('/devices/{id}/delete', 'destroy')->name('delete_device_info');
});
