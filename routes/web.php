<?php

use App\Http\Controllers\Auth\AuthController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Request $request) {
    return inertia('Home', ['users' => User::when($request->search, function ($query) use ($request) {
        $query->where('name', 'like', '%' . $request->search . '%')->orWhere('email', $request->search);
    })->paginate(5)->withQueryString(),'searchTerm'=>$request->search]);
})->name('home');

Route::middleware('guest')->group(function () {
    Route::inertia('/register', 'Auth/Register')->name('register');

    Route::post('/register', [AuthController::class, 'register'])->name('register');

    Route::inertia('/login', 'Auth/Login')->name('login');

    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::inertia('/dashboard', 'Dashboard/dashboard')->name('dashboard');
});
