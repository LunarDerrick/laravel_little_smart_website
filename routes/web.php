<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

require __DIR__.'/auth.php';

// landing page navigation
Route::get('/', function () {
    // return view('welcome');
    return view('index');
})->name('index');

Route::get('/Login', function () {
    return view('Login');
})->name('login');

Route::post('/Login', [LoginController::class, 'login']
)->name('login.submit');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// all navigation that require users to be logged in goes here
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/login_admin_temp', function () {
        return view('login_admin_temp');
    })->name('login_admin_temp');
});
