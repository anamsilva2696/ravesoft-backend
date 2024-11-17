<?php

use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('applications', ApplicationController::class);
Route::post('/applications', [ApplicationController::class, 'store'])->name('applications.store');

