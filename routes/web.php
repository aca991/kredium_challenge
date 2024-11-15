<?php

use App\Http\Controllers\AdvisorController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'login'])
    ->name('login');

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');

Route::post('/authenticate', [LoginController::class, 'authenticate'])
    ->name('authenticate');

Route::get('/dashboard', [AdvisorController::class, 'dashboard'])
    ->name('advisor.dashboard')
    ->middleware('auth');

Route::get('/clients', [AdvisorController::class, 'clients'])
    ->name('advisor.clients.list')
    ->middleware('auth');

Route::get('/create-client', [AdvisorController::class, 'createClient'])
    ->name('advisor.client.create')
    ->middleware('auth');

Route::post('/store-client', [AdvisorController::class, 'storeClient'])
    ->name('advisor.client.store')
    ->middleware('auth');
