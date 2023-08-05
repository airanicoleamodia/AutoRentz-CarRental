<?php

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Car\CarController;
use App\Http\Controllers\Car\FuelController;
use App\Http\Controllers\Car\TransmissionController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\Car\AccessoriesController;

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
Route::get('/show/{id}', [CarController::class, 'show']);

Route::get('/report/sales', [AdminController::class, 'salesReport']);
Route::get('/report/search', [AdminController::class, 'reportSearch']);

Route::post('/transmission', [TransmissionController::class, 'store']);
Route::put('/transmission/{id}', [TransmissionController::class, 'update']);
Route::delete('/transmission/delete/{id}', [TransmissionController::class, 'destroy']);

Route::get('/drivers', [DriverController::class, 'index']);
Route::post('/drivers', [DriverController::class, 'store']);
Route::get('/drivers/{id}/edit', [DriverController::class, 'edit']);
Route::put('/drivers/{id}/update', [DriverController::class, 'update']);
Route::post('drivers/images', [DriverController::class, 'storeMedia'])->name('drivers.storeMedia');
Route::delete('/drivers/{id}/images', [DriverController::class, 'deleteMedia']);
Route::delete('/drivers/{id}/delete', [DriverController::class, 'destroy']);
Route::get('/drivers/{id}/view/images', [DriverController::class, 'viewMedia']);

Route::get('/location', [LocationController::class, 'index']);
Route::post('/location', [LocationController::class, 'store']);
Route::post('/location/storeMedia', [LocationController::class, 'storeMedia'])->name('location.storeMedia');
Route::get('/location/{id}/edit', [LocationController::class, 'edit']);
Route::put('/location/{id}/update', [LocationController::class, 'update']);
Route::delete('/location/{id}/images', [LocationController::class, 'deleteMedia']);
Route::get('/location/view/{id}/images', [LocationController::class, 'viewImages']);
Route::delete('/location/{id}/delete', [LocationController::class, 'destroy']);
Route::post('/location/multidelete', [LocationController::class, 'multidestroy']);


Route::resource('cars', CarController::class);
Route::post('/cars/storeMedia', [CarController::class, 'storeMedia'])->name('cars.storeMedia');
Route::delete('/cars/{id}/images', [CarController::class, 'deleteMedia']);
Route::get('/cars/{id}/view/images', [CarController::class, 'viewMedia']);

Route::resource('accessories', AccessoriesController::class);
Route::post('/accessories/storeMedia', [AccessoriesController::class, 'storeMedia'])->name('accessories.storeMedia');
Route::delete('/accessories/{id}/images', [AccessoriesController::class, 'deleteMedia']);
Route::get('/accessories/{id}/view/images', [AccessoriesController::class, 'viewMedia']);
