<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'login'])
    ->name('login');

Route::post('/authenticate', [LoginController::class, 'authenticate'])
    ->name('authenticate');
