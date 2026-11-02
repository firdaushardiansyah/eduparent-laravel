<?php

use Illuminate\Http\Request;
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

Route::post('/logout', function (Request $request) {
    if (auth()->check()) {
        auth()->logout();
    }
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login')->with('success', 'Anda telah berhasil keluar.');
})->name('logout');

// Placeholder testing route for layout verification (Local & Testing environments only)
if (app()->environment('local', 'testing')) {
    Route::get('/layout-check', function () {
        return view('pages.layout-check');
    })->name('layout-check');

    Route::post('/layout-check/submit', function (Request $request) {
        $validated = $request->validate([
            'nama_siswa' => 'required|min:3|string',
            'kelas' => 'required|string',
            'catatan' => 'nullable|string',
        ]);

        return back()
            ->withInput()
            ->with('success', 'Form verifikasi layout berhasil dikirim untuk: '.$validated['nama_siswa']);
    })->name('layout-check.submit');
}
