<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;

Route::middleware('auth:sanctum')->get('/applications', [ApplicationController::class, 'getApplications']);
Route::post('/login', [AuthController::class, 'login']);

