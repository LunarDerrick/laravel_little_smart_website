<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RosterController;
use App\Http\Controllers\AnalysisController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Middleware\CheckSessionTimeout;
use App\Http\Middleware\RedirectIfAuthenticated;

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

    // auth reference
    // Route::get('/login', function () {
    //     return view('auth.login');
    // })->name('login');

    // auth reference
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['auth', 'verified'])->name('dashboard');

    // all navigation that require users to be logged in goes here
    Route::middleware('auth')->group(function () {
        // auth reference
        // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // if a page needs to pass variable/fetch from database, include controller in routing like below
        // index is function name, and the function will be in charge of returning relevant view
        Route::get('/roster', [RosterController::class, 'index']
        )->name('roster');

        Route::get('/analysis', [AnalysisController::class, 'topScore']
        )->name('analysis');

        Route::get('/chart-data-1', [AnalysisController::class, 'getPassingRate']);
        Route::get('/chart-data-2', [AnalysisController::class, 'getGradeDistribution']);
        Route::get('/chart-data-3', [AnalysisController::class, 'getAvgScore']);

        Route::get('/feedback', function () {
            return view('feedback');
        })->name('feedback');

        Route::get('/list_post', function () {
            return view('list_post');
        })->name('list_post');

        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']
        )->name('logout');
    });

});

// Ensure only unauthenticated users may access these
Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('login');
    })->name('login');

    Route::post('/login', [LoginController::class, 'login']
    )->name('login.submit');
});

Route::middleware(RedirectIfAuthenticated::class)->group(function () {
    Route::get('/login', function () {
        return view('login');
    })->name('login');
});
