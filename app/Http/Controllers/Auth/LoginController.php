<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\Auth\LoginService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function __construct(
        protected LoginService $loginService
    ) {}

    /**
     * Display the login form.
     */
    public function show(): View
    {
        return view('auth.login');
    }

    /**
     * Handle login attempt.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $user = $this->loginService->attempt(
            $request,
            $request->input('email'),
            $request->input('password'),
            $request->boolean('remember')
        );

        // Redirect to intended location or dashboard based on role
        return redirect()->intended(
            $user->isGuru() ? route('guru.dashboard') : route('ortu.dashboard')
        );
    }

    /**
     * Handle logout.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $this->loginService->logout($request);

        return redirect()->route('login')->with('success', 'Anda telah berhasil keluar.');
    }
}
