<?php

use App\Http\Controllers\AdvisorController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'login'])
    ->name('login');

Route::get('/logout', [LoginController::class, 'logout'])
    ->name('logout');

Route::post('/authenticate', [LoginController::class, 'authenticate'])
    ->name('authenticate');

Route::get('/dashboard', [AdvisorController::class, 'dashboard'])
    ->name('dashboard')
    ->middleware('auth');
