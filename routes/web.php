<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CaissierController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MenuController; // Ajout du MenuController

// Route for the welcome page
Route::get('/', function () {
    return view('welcome');
});

// Menu route
Route::get('/menu', [MenuController::class, 'index'])->name('menu');

// Authentication Routes
Route::get('/sign-in', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/log', function () {
    return view('dashboard');
})->name('log');

// Route vers la page des rôles
Route::get('/roles', function () {
    // Définir les rôles à passer à la vue
    $roles = [
        ['name' => 'Admin', 'description' => 'Administrateur du système'],
        ['name' => 'Client', 'description' => 'Client de la pizzeria'],
        ['name' => 'Chef', 'description' => 'Prépare les pizzas'],
        ['name' => 'Caissier', 'description' => 'Gère les paiements et les commandes'],
    ];

    // Passer la variable $roles à la vue
    return view('roles', compact('roles'));
})->name('roles');

// Protected Dashboard route
Route::get('/dashboard', function () {
    return "Welcome to the Dashboard!";
})->middleware('auth')->name('dashboard');

// Role-specific routes group
Route::prefix('roles')->group(function () {
    Route::get('/admin', function () {
        return view('admin');
    })->name('view.admin');

    Route::get('/chef', function () {
        return view('chef');
    })->name('view.chef');

    Route::get('/client', function () {
        return view('client');
    })->name('view.client');
});

// Caissier routes group
Route::prefix('caissier')->group(function () {
    Route::get('/', [CaissierController::class, 'index'])->name('view.caissier');

    // Orders routes
    Route::prefix('orders')->group(function () {
        Route::get('/', [CaissierController::class, 'orders'])->name('orders.index');
        Route::post('/', [CaissierController::class, 'createOrder'])->name('orders.create');
        Route::get('/{order}', [CaissierController::class, 'showOrderDetails'])->name('orders.show');
        Route::patch('/{order}/status', [CaissierController::class, 'updateOrderStatus'])->name('orders.updateStatus');
        Route::get('/stats', [CaissierController::class, 'getOrderStats'])->name('orders.stats');
    });

    // Products routes
    Route::prefix('products')->group(function () {
        Route::patch('/{product}/update-stock', [CaissierController::class, 'updateStock'])->name('products.updateStock');
        Route::get('/search', [CaissierController::class, 'searchProducts'])->name('products.search');
        Route::get('/low-stock', [CaissierController::class, 'getLowStockProducts'])->name('products.lowStock');
    });
});
