<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// routes/web.php

use App\Http\Controllers\AuthController;

Route::get('/sign-in', [AuthController::class, 'showLoginForm'])->name('login');



