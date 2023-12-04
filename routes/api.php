<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/auth')->group(function () {
    Route::post('/register', 'App\Http\Controllers\Api\auth\RegisterController@register');
    Route::post('/login', 'App\Http\Controllers\Api\auth\LoginController@login');
    Route::post('/logout', 'App\Http\Controllers\Api\auth\LoginController@logout')->middleware('auth:sanctum');
    Route::post('/refresh', 'App\Http\Controllers\Api\auth\LoginController@refresh');
    // Route::post('/email/verification-notification', 'App\Http\Controllers\Api\auth\VerificationController@sendVerificationEmail')->middleware('auth:sanctum');
    // Route::post('/email/verify/{id}/{hash}', 'App\Http\Controllers\Api\auth\VerificationController@verify')->name('verification.verify')->middleware('auth:sanctum');
    // Route::post('/password/email', 'App\Http\Controllers\Api\auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
});


