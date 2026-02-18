<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

Route::get('/ai-health', function () {
    $response = Http::get('http://127.0.0.1:8001/health');

    return response()->json([
        'from_fastapi' => $response->json()
    ]);
});
