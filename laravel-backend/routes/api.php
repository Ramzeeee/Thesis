<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\GuestSessionController;
use App\Http\Controllers\DisclaimerController;
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;

// Public routes — no token required
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);
Route::post('/guest',    [GuestSessionController::class, 'create']);

// Guest disclaimer — no Bearer token, uses session_token in body
Route::post('/guest/disclaimer', [DisclaimerController::class, 'acknowledge']);
Route::post('/guest/chat',       [ChatController::class, 'sendMessage']);


// Protected routes — requires valid Sanctum Bearer token
// Any request without a valid token gets a 401 Unauthorized response
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout',     [AuthController::class, 'logout']);
    Route::post('/disclaimer', [DisclaimerController::class, 'acknowledge']);
    Route::post('/chat',            [ChatController::class, 'sendMessage']);
    Route::get('/chat/history',     [ChatController::class, 'getHistory']);
    Route::delete('/chat/history',  [ChatController::class, 'deleteHistory']);
});
