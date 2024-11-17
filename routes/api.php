<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;

Route::middleware('auth:sanctum')->get('/applications', [ApplicationController::class, 'getApplications']);
Route::post('/login', [AuthController::class, 'login']);

