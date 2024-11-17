<?php

use App\Http\Controllers\AdvisorController;
use App\Http\Controllers\ClientController;
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

Route::get('/clients', [ClientController::class, 'clients'])
    ->name('client.list')
    ->middleware('auth');

Route::get('/create-client', [ClientController::class, 'createForm'])
    ->name('client.create')
    ->middleware('auth');

Route::get('/edit-client/{client}', [ClientController::class, 'editForm'])
    ->name('client.edit')
    ->middleware('auth');

Route::post('/store-client/', [ClientController::class, 'storeClient'])
    ->name('client.store')
    ->middleware('auth');

Route::post('/delete-client/{client}', [ClientController::class, 'deleteClient'])
    ->name('client.delete')
    ->middleware('auth');
