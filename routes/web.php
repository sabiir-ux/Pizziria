<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// routes/web.php

use App\Http\Controllers\AuthController;

Route::get('/sign-in', [AuthController::class, 'showLoginForm'])->name('login');


use App\Http\Controllers\AutheController;

Route::get('/log', function () {
    return view('dashboard');
})->name('log');


Route::get('/dashboard', function () {
    return "Welcome to the Dashboard!";
})->middleware('auth')->name('dashboard');

