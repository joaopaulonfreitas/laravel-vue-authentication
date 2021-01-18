<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PasswordController;
use App\Http\Controllers\Api\UserController;
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


//Route::get('/hello', fn() => 'Hello, world');
//Route::get('hello', [AuthController::class, 'hello'])->name('hello');

Route::get('users', [UserController::class, 'index'])->name('users');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('forgot', [PasswordController::class, 'forgot'])->name('forgot');
Route::post('reset', [PasswordController::class, 'reset'])->name('reset');

Route::middleware(['auth:sanctum'])->group(function(){
    
    Route::get('user', [AuthController::class, 'user'])->name('user');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

});
