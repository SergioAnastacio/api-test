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
Route::get('user', [UserController::class, 'show'])->middleware('auth:sanctum');
Route::apiResource('products', ProductController::class)->middleware('auth:sanctum');
