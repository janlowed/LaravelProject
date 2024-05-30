<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('admin.dashboard');
});
Route::get('/verifyOtp', function () {
    return view('verifyOtp');
});

Route::get('/users', [UserController::class, 'index']);

Route::get('/profile', [ProfileController::class, 'index']);

Route::get('/addUser', [UserController::class, 'create']);

// Route::get('/editUser/{id}', [UserController::class, 'edit']);
