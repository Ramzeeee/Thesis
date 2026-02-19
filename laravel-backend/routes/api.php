<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AIController;

Route::get('/ai-health', [AIController::class, 'health']);
Route::post('/chat', [AIController::class, 'chat']);
