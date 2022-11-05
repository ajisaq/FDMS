<?php

use App\Http\Controllers\ClusterController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClusterTypeController;
use App\Http\Controllers\DispatchController;
use Illuminate\Support\Facades\Auth;
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
    Route::get('/stations/{id}/activate', 'activation')->name('activation_station');
});

// Cluster Types routes
Route::controller(ClusterTypeController::class)->group(function () {
    Route::get('/cluster-type/list', 'index')->name('list_cluster_types');
    Route::get('/cluster-type/add', 'create')->name('show_add_cluster_type');
    Route::post('/cluster-type/add', 'store')->name('store_cluster_type');
    Route::post('/cluster-type/{id}/edit', 'update')->name('update_cluster_type');
    Route::post('/cluster-type/{id}/delete', 'destroy')->name('delete_cluster_type');
});

// Clusters routes
Route::controller(ClusterController::class)->group(function () {
    Route::get('/clusters/list', 'index')->name('list_clusters');
    Route::get('/clusters/add', 'create')->name('show_add_cluster');
    Route::post('/clusters/add', 'store')->name('store_cluster');
    Route::get('/clusters/{id}/info', 'show')->name('show_cluster_info');
    Route::get('/clusters/{id}/edit', 'edit')->name('show_edit_cluster');
    Route::post('/clusters/{id}/edit', 'update')->name('update_cluster_info');
    Route::get('/station/{id}/cluster/list', 'show_station_cluster')->name('list_station_clusters');
    Route::get('/staion/{id}/cluster/add', 'create_station_cluster')->name('add_station_cluster');
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
    Route::get('/pos/tank/by/cluster', 'search_tank')->name('search_tank');
});


// Device routes
Route::controller(DeviceController::class)->group(function () {
    Route::get('/devices/list', 'index')->name('list_devices');
    Route::get('/devices/add', 'create')->name('show_add_device');
    Route::post('/devices/add', 'store')->name('store_device');
    Route::get('/devices/{id}/info', 'show')->name('show_device_info');
    Route::get('/devices/{id}/edit', 'edit')->name('show_edit_device');
    Route::post('/devices/{id}/edit', 'update')->name('update_device_info');
    Route::post('/devices/{id}/delete', 'destroy')->name('delete_device_info');
});


// Inventory routes
Route::controller(InventoryController::class)->group(function () {
    Route::get('/inventory/list', 'index')->name('list_inventories');
    Route::get('stations/{id}/inventory/list', 'station_inventories')->name('list_station_inventories');
    Route::get('/inventory/add', 'create')->name('show_add_inventory');
    Route::post('/inventory/add', 'store')->name('store_inventory');
    Route::get('/inventory/station/{id}', 'inventory_by_station')->name('get_inventory_by_station');
    // Route::get('/inventory/{id}/edit', 'edit')->name('show_edit_device');
    // Route::post('/inventory/{id}/edit', 'update')->name('update_device_info');
    // Route::post('/inventory/{id}/delete', 'destroy')->name('delete_device_info');
});

// Category routes
Route::controller(CategoryController::class)->group(function () {
    Route::get('/category/list', 'index')->name('list_categories');
    Route::get('/category/add', 'create')->name('show_add_category');
    Route::post('/category/add', 'store')->name('store_category');
    Route::get('/category/{id}/info', 'show')->name('show_category_info');
    Route::get('/category/{id}/edit', 'edit')->name('show_edit_category');
    Route::post('/category/{id}/edit', 'update')->name('update_category_info');
    Route::post('/category/{id}/delete', 'destroy')->name('delete_category_info');
});

// Customer routes
Route::controller(CustomerController::class)->group(function () {
    Route::get('/customer/list', 'index')->name('list_customers');
    Route::get('/customer/add', 'create')->name('show_add_customer');
    Route::post('/customer/add', 'store')->name('store_customer');
    Route::get('/customer/{id}/info', 'show')->name('show_customer_info');
    Route::get('/customer/{id}/edit', 'edit')->name('show_edit_customer');
    Route::post('/customer/{id}/edit', 'update')->name('update_customer_info');
    Route::post('/customer/{id}/delete', 'destroy')->name('delete_customer_info');
});


// Location routes
Route::controller(LocationController::class)->group(function () {
    Route::get('/location/list', 'index')->name('list_locations');
    Route::get('/location/add', 'create')->name('show_add_location');
    Route::post('/location/add', 'store')->name('store_location');
    Route::post('/location/{id}/delete', 'destroy')->name('delete_location');
});

// Category routes
Route::controller(UserController::class)->group(function () {
    Route::get('/user/list', 'index')->name('list_users');
    Route::get('/user/create', 'show_register')->name('add_new_user');
    Route::post('/user/create', 'store')->name('store_user');
    // Route::get('/location/add', 'create')->name('show_add_location');
    // Route::post('/location/{id}/delete', 'destroy')->name('delete_location');
});

// Category routes
Route::controller(DispatchController::class)->group(function () {
    Route::get('/supplies', 'index')->name('supplies');
    Route::get('/supplies/open/dispatch', 'create')->name('add_new_dispatch');
    Route::post('/supplies/open/dispatch', 'store')->name('store_dispatch');
    Route::get('/supplies/update/{id}/dispatch', 'edit')->name('show_update_dispatch');
    Route::post('/supplies/update/{id}/dispatch', 'update')->name('update_dispatch');
    // Route::post('/location/{id}/delete', 'destroy')->name('delete_dispatch');
});
