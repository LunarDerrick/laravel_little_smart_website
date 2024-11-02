<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnalysisController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RosterController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
// use App\Http\Controllers\Auth\NewPasswordController;
// use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Middleware\CheckRole;
use App\Http\Middleware\CheckSessionTimeout;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\SingleSessionRedirect;

require __DIR__.'/auth.php';

// Session timeout check wrapper
Route::middleware([CheckSessionTimeout::class, SingleSessionRedirect::class])->group(function () {

    // landing page reference
    // Route::get('/', function () {
    //     return view('welcome');
    // });

    // true landing page
    Route::get('/', function () {
        return view('index');
    })->name('index');
        // Route::get('/', [PostController::class, 'indexHome']
    // )->name('index');

    Route::get('/news', [PostController::class, 'indexHome']
    )->name('news');

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
        Route::get('/profile', [ProfileController::class, 'index']
        )->name('profile');

        Route::middleware([CheckRole::class . ':teacher'])->group(function () {
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

            Route::get('/analysis', [AnalysisController::class, 'tableData']
            )->name('analysis');

            Route::get('/no-record', [AnalysisController::class, 'showNoRecords']);

            Route::get('/chart-data-1', [AnalysisController::class, 'getPassingRate']);
            Route::get('/chart-data-2', [AnalysisController::class, 'getAvgScore']);
            Route::get('/chart-data-3', [AnalysisController::class, 'getMandarinGrade']);
            Route::get('/chart-data-4', [AnalysisController::class, 'getEnglishGrade']);
            Route::get('/chart-data-5', [AnalysisController::class, 'getMalayGrade']);
            Route::get('/chart-data-6', [AnalysisController::class, 'getMathGrade']);
            Route::get('/chart-data-7', [AnalysisController::class, 'getScienceGrade']);
            Route::get('/chart-data-8', [AnalysisController::class, 'getHistoryGrade']);
            Route::get('/chart-data-9', [AnalysisController::class, 'getPassingRateStandard']);
            Route::get('/chart-data-10', [AnalysisController::class, 'getAvgScoreStandard']);
            Route::get('/chart-data-11', [AnalysisController::class, 'getStd1Grade']);
            Route::get('/chart-data-12', [AnalysisController::class, 'getStd2Grade']);
            Route::get('/chart-data-13', [AnalysisController::class, 'getStd3Grade']);
            Route::get('/chart-data-14', [AnalysisController::class, 'getStd4Grade']);
            Route::get('/chart-data-15', [AnalysisController::class, 'getStd5Grade']);
            Route::get('/chart-data-16', [AnalysisController::class, 'getStd6Grade']);
            Route::get('/chart-data-17/{id}', [AnalysisController::class, 'getAvgScoreSpecific']);
            Route::get('/chart-data-18/{id}', [AnalysisController::class, 'getScoreSpecific']);
            Route::get('/chart-data-19/{id}', [AnalysisController::class, 'getMandarinSpecific']);
            Route::get('/chart-data-20/{id}', [AnalysisController::class, 'getEnglishSpecific']);
            Route::get('/chart-data-21/{id}', [AnalysisController::class, 'getMalaySpecific']);
            Route::get('/chart-data-22/{id}', [AnalysisController::class, 'getMathSpecific']);
            Route::get('/chart-data-23/{id}', [AnalysisController::class, 'getScienceSpecific']);
            Route::get('/chart-data-24/{id}', [AnalysisController::class, 'getHistorySpecific']);

            Route::get('/inbox', [FeedbackController::class, 'index']
            )->name('feedback.list');

            Route::get('/feedback/{id}', [FeedbackController::class, 'show']
            )->name('feedback');

            Route::post('/add_feedback', [FeedbackController::class, 'store']
            )->name('feedback.add');

            Route::post('/read_selected_feedbacks', [FeedbackController::class, 'readSelected']
            )->name('feedback.read_selected');

            Route::post('/feedback/{id}/unread_feedback', [FeedbackController::class, 'unread']
            )->name('feedback.unread');

            Route::post('/unread_selected_feedbacks', [FeedbackController::class, 'unreadSelected']
            )->name('feedback.unread_selected');

            Route::delete('/feedback/{id}', [FeedbackController::class, 'destroy']
            )->name('feedback.delete');

            Route::delete('/delete_selected_feedbacks', [FeedbackController::class, 'destroySelected']
            )->name('feedback.delete_selected');

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
        });
    });

});

Route::middleware([CheckSessionTimeout::class, 'auth'])->group(function () {
    Route::get('/session_conflict', function () {
        return view('session_conflict');
    })->name('session_conflict');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']
    )->name('logout');
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

// no condition check required
Route::get('/access_denied', function () {
    return view('access_denied');
})->name('access.denied');

Route::post('/add_feedback', [FeedbackController::class, 'store']
)->name('feedback.add');

Route::get('/forgot_password', function () {
    return view('forgot_password');
})->name('password.forgot');

Route::post('/forgot_password', [LoginController::class, 'storeToken']
)->name('password.email_link');

Route::get('/reset-password/{token}', [LoginController::class, 'create']
)->name('password.reset');

Route::put('reset-password', [LoginController::class, 'editPassword']
)->name('password.edit');

// auth reference
// Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
// Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
// Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
// Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.update');
