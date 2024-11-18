<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    // Check if the user is authenticated
    if (Auth::check()) {
        // If authenticated, redirect to the home screen
        return redirect('/applications');
    } else {
        // If not authenticated, redirect to the login screen
        return redirect('/login');
    }
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::resource('applications', ApplicationController::class);
});


