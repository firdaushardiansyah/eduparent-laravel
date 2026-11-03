<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ChangePasswordRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class PasswordChangeController extends Controller
{
    /**
     * Display the password change form.
     */
    public function edit(Request $request): View
    {
        return view('auth.change-password', [
            'mustChange' => $request->user()->must_change_password,
        ]);
    }

    /**
     * Handle password change.
     */
    public function update(ChangePasswordRequest $request): RedirectResponse
    {
        $user = $request->user();

        // Update password
        $user->password = Hash::make($request->input('password'));
        $user->must_change_password = false;
        $user->save();

        // Regenerate session to prevent session fixation
        $request->session()->regenerate();

        // Optionally logout other devices
        // Auth::logoutOtherDevices($request->input('password'));

        $redirectRoute = $user->isGuru() ? route('guru.dashboard') : route('ortu.dashboard');

        return redirect($redirectRoute)->with('success', 'Kata sandi berhasil diubah.');
    }
}
