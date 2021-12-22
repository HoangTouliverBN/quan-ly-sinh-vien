<?php

use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\resetPasswordController;
use GuzzleHttp\Middleware;
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


Route::middleware(['checkLogin'])->group(function () {
    Route::get('/', [AuthenticateController::class, 'showLogin']);
    Route::post('login', [AuthenticateController::class, 'login']);
    Route::get('password/forget', [resetPasswordController::class, 'ShowEmailRequest']);
    Route::post('password/forget', [resetPasswordController::class, 'emailRequest']);
    Route::get('password/reset/{token}', [resetPasswordController::class, 'showResetPassword']);
    Route::post('password/reset/{token}', [resetPasswordController::class, 'resetPassword']);
});
Route::get('/logout', [AuthenticateController::class, 'logout']);

Route::get('/welcome', function () {
    return view('welcome');
});
