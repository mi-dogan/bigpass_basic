<?php

use App\Http\Controllers\Back\ActivityController;
use App\Http\Controllers\Back\QrcodeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/activity', [ActivityController::class, 'store']);
Route::post('/activity-multi', [ActivityController::class, 'storeMultiple']);
Route::post('/generate-random-qr-code', [QrcodeController::class, 'generateRandom']);
Route::get('/getEmployees/{id}',[ActivityController::class,'getEmployeesFromDeviceId']);
