<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PasswordChangeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Guru\DashboardController as GuruDashboardController;
use App\Http\Controllers\Ortu\DashboardController as OrtuDashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Guest routes (login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});

// Authenticated routes
Route::middleware(['auth', 'active', 'password.changed'])->group(function () {
    // Main dashboard redirect
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    // Guru routes
    Route::middleware(['role:guru'])->prefix('guru')->name('guru.')->group(function () {
        Route::get('/dashboard', GuruDashboardController::class)->name('dashboard');
    });

    // Orang Tua routes
    Route::middleware(['role:ortu'])->prefix('ortu')->name('ortu.')->group(function () {
        Route::get('/dashboard', OrtuDashboardController::class)->name('dashboard');
    });
});

// Password change routes (exempt from password.changed middleware)
Route::middleware(['auth', 'active'])->group(function () {
    Route::get('/change-password', [PasswordChangeController::class, 'edit'])->name('password.change.edit');
    Route::post('/change-password', [PasswordChangeController::class, 'update'])->name('password.change.update');
});

// Logout (POST only)
Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');

// Placeholder testing route for layout verification (Local & Testing environments only)
if (app()->environment('local', 'testing')) {
    Route::middleware(['auth', 'active', 'password.changed'])->group(function () {
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
    });
}
