<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\loginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('login',[loginController::class,'login']);
Route::post('verifyOTP',[loginController::class,'verifyOTP']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::middleware('auth:sanctum')->group(function(){
//     Route::get('/getAll', [AuthController::class, 'getAll']);
// });

// Route::post('/login', [AuthController::class, 'login']);
Route::get('/getAll', [AuthController::class, 'getAll']);