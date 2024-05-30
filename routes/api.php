<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\UserController;
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
Route::get('/editUser', function () {
    return view('users.edit');
});

Route::post('login',[loginController::class,'login']);
Route::post('verifyOTP',[loginController::class,'verifyOTP']);
Route::post('createUser', [loginController::class, 'createUser']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getAll', [AuthController::class, 'getAll']);

Route::put('/editUser/{id}', [UserController::class, 'editUser']);
