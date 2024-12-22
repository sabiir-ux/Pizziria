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


use App\Http\Controllers\ProductController;

// Make sure to add this use statement at the top



    // Caissier routes
    Route::get('/caissier', [CaissierController::class, 'index'])->name('view.caissier');
    Route::patch('/products/{product}/update-stock', [CaissierController::class, 'updateStock'])->name('products.updateStock');
    Route::get('/orders', [CaissierController::class, 'orders'])->name('orders.index');
    Route::patch('/orders/{order}/status', [CaissierController::class, 'updateOrderStatus'])->name('orders.updateStatus');
    Route::get('/products/search', [CaissierController::class, 'searchProducts'])->name('products.search');
    Route::get('/products/low-stock', [CaissierController::class, 'getLowStockProducts'])->name('products.lowStock');
    Route::get('/orders/{order}', [CaissierController::class, 'showOrderDetails'])->name('orders.show');
    Route::get('/order-stats', [CaissierController::class, 'getOrderStats'])->name('orders.stats');
    Route::post('/orders', [CaissierController::class, 'createOrder'])->name('orders.create');
