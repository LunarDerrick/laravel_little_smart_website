<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnalysisController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RosterController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Middleware\CheckSessionTimeout;
use App\Http\Middleware\RedirectIfAuthenticated;

require __DIR__.'/auth.php';

// Session timeout check wrapper
Route::middleware([CheckSessionTimeout::class])->group(function () {

    // landing page reference
    // Route::get('/', function () {
    //     return view('welcome');
    // });

    // true landing page
    Route::get('/', [PostController::class, 'indexHome']
    )->name('index');

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

        /**
         * if a page needs to pass variable/fetch from database, include controller in routing like below
         * index is function name, and the function will be in charge of returning relevant view
        */
        Route::get('/roster', [RosterController::class, 'index']
        )->name('roster');

        Route::get('/add_roster', function () {
            return view('add_roster');
        })->name('add_roster');

        Route::post('/add_roster', [RosterController::class, 'store']
        )->name('roster.add');

        Route::get('/edit_roster/{id}', [RosterController::class, 'edit']
        )->name('roster.edit');

        Route::put('/edit_roster/{id}', [RosterController::class, 'update']
        )->name('roster.update');

        Route::delete('/roster/{id}', [RosterController::class, 'destroy']
        )->name('roster.delete');

        Route::get('/analysis', [AnalysisController::class, 'topScore']
        )->name('analysis');

        Route::get('/no-record', [AnalysisController::class, 'showNoRecords']);

        Route::get('/chart-data-1', [AnalysisController::class, 'getPassingRate']);
        Route::get('/chart-data-2', [AnalysisController::class, 'getGradeDistribution']);
        Route::get('/chart-data-3', [AnalysisController::class, 'getAvgScore']);

        Route::get('/inbox', [FeedbackController::class, 'index']
        )->name('feedback.list');

        Route::get('/feedback/{id}', [FeedbackController::class, 'show']
        )->name('feedback');

        Route::post('/add_feedback', [FeedbackController::class, 'store']
        )->name('feedback.add');

        Route::post('/read_all_feedbacks', [FeedbackController::class, 'readAll']
        )->name('feedback.read_all');

        Route::delete('/feedback/{id}', [FeedbackController::class, 'destroy']
        )->name('feedback.delete');

        Route::delete('/delete_all_feedbacks', [FeedbackController::class, 'destroyAll']
        )->name('feedback.delete_all');

        Route::get('/post', [PostController::class, 'indexList']
        )->name('post');

        Route::get('/add_post', function () {
            return view('add_post');
        })->name('add_post');

        Route::post('/add_post', [PostController::class, 'store']
        )->name('post.add');

        Route::get('/edit_post/{id}', [PostController::class, 'edit']
        )->name('post.edit');

        Route::put('/edit_post/{id}', [PostController::class, 'update']
        )->name('post.update');

        Route::delete('/post/{id}', [PostController::class, 'destroy']
        )->name('post.delete');

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
