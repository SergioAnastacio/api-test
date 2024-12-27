<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//! public routes
Route::post('login', [AuthController::class, 'login']);

//! check if the server is up
Route::get('up', function () {
    return response()->json(['status' => 'OK'], 200);
});

//! use bearer token to access this route
Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [UserController::class, 'show']);
    Route::apiResource('products', ProductController::class);
});
