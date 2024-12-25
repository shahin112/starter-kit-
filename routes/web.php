<?php

use App\Http\Controllers\Auth\NavController;
use Illuminate\Support\Facades\Route;

Route::get("/", [NavController::class, 'dashboard'])->name('dashboard');
Route::get('/organization', [NavController::class, 'organization'])->name('organization');
Route::get('/contracts', [NavController::class, 'contracts'])->name('contracts');
Route::get('/reports', [NavController::class, 'reports'])->name('reports');
