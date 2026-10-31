<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.dashboard');
})->name('dashboard');

Route::get('/login', function () {
    return view('pages.login');
})->name('login');

Route::post('/login', function () {
    return redirect()->route('dashboard');
});

Route::get('/register', function () {
    return view('pages.register');
})->name('register');

Route::post('/register', function () {
    return redirect()->route('dashboard');
});

Route::get('/forgot-password', function () {
    return view('pages.forgot-password');
})->name('password.request');

Route::post('/forgot-password', function () {
    return back()->with('status', 'Link reset password telah dikirim ke email Anda.');
})->name('password.email');
