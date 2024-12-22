<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CaissierController;
use App\Http\Controllers\AuthController;

// Route for the welcome page
Route::get('/', function () {
    return view('welcome');
});

// Role-specific views
Route::get('/admin', function () {
    return view('admin'); // This will load resources/views/admin.blade.php
})->name('view.admin');

Route::get('/chef', function () {
    return view('chef'); // This will load resources/views/chef.blade.php
})->name('view.chef');

Route::get('/caissier', function () {
    return view('caissier'); // This will load resources/views/caissier.blade.php
})->name('view.caissier');

Route::get('/client', function () {
    return view('client'); // This will load resources/views/client.blade.php
})->name('view.client');

// Authentication Routes
Route::get('/sign-in', [AuthController::class, 'showLoginForm'])->name('login');

// Route for the dashboard view
Route::get('/log', function () {
    return view('dashboard'); // Ensure you have resources/views/dashboard.blade.php
})->name('log');

// Protected Dashboard route
Route::get('/dashboard', function () {
    return "Welcome to the Dashboard!";
})->middleware('auth')->name('dashboard');



