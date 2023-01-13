<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\CarModelController;
use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\DataController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/manufacturers', [ManufacturerController::class, 'list']);
Route::get('/manufacturers/create', [ManufacturerController::class, 'create']);
Route::post('/manufacturers/put', [ManufacturerController::class, 'put']);
Route::get('/manufacturers/update/{manufacturers}', [ManufacturerController::class, 'update']);
Route::post('/manufacturers/patch/{manufacturers}', [ManufacturerController::class, 'patch']);
// CarModel routes
Route::get('/car_models', [CarModelController::class, 'list']);
Route::get('/car_models/create', [CarModelController::class, 'create']);
Route::post('/car_models/put', [CarModelController::class, 'put']);
Route::get('/car_models/update/{carmodel}', [CarModelController::class, 'update']);
Route::post('/car_models/patch/{carmodel}', [CarModelController::class, 'patch']);
Route::post('/car_models/delete/{carmodel}', [CarModelController::class, 'delete']);
// Auth routes
Route::get('/login', [AuthorizationController::class, 'login'])->name('login');
Route::post('/auth', [AuthorizationController::class, 'authenticate']);
Route::get('/logout', [AuthorizationController::class, 'logout']);
// Data routes
Route::prefix('data')->group(function () {
    Route::get('/get-top-car_models', [DataController::class, 'gettopcarmodels']);
    Route::get('/get-car_models/{carmodel}', [DataController::class, 'getcarmodels']);
    Route::get('/get-relatedbooks/{carmodel}', [DataController::class, 'getrelatedcarmodels']);
});
   