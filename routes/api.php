<?php

// routes/api.php
// routes/api.php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/submit-form', [FormController::class, 'submitForm']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    if ($request->user()) {
        return $request->user();
    } else {
        return response()->json(['message' => 'User not authenticated'], 401);
    }
});