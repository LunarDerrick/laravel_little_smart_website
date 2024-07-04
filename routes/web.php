<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RosterController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Middleware\CheckSessionTimeout;

require __DIR__.'/auth.php';

// Session timeout check wrapper
Route::middleware([CheckSessionTimeout::class])->group(function () {

    // landing page navigation
    Route::get('/', function () {
        // return view('welcome');
        return view('index');
    })->name('index');

    Route::get('/about', function () {
        return view('about');
    })->name('about');

    Route::get('/login', function () {
        return view('login');
    })->name('login');

    // auth reference
    // Route::get('/login', function () {
    //     return view('auth.login');
    // })->name('login');

    Route::post('/login', [LoginController::class, 'login']
    )->name('login.submit');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    // all navigation that require users to be logged in goes here
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // if a page needs to pass variable/fetch from database, include controller in routing like below
        // index is function name, and the function will be in charge of returning relevant view
        Route::get('/roster', [RosterController::class, 'index']
        )->name('roster');

        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']
        )->name('logout');
    });

});
