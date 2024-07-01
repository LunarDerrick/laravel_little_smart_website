<?php

use Illuminate\Support\Facades\Route;

// landing page navigation
Route::get('/', function () {
    // return view('welcome');
    return view('index');
})->name('index');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/about', function () {
    return view('about');
})->name('about');
