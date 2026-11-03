<?php

namespace App\Services\Auth;

use App\Models\LoginAudit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class LoginService
{
    /**
     * Attempt to authenticate the user.
     *
     * @throws ValidationException
     */
    public function attempt(Request $request, string $email, string $password, bool $remember): User
    {
        $throttleKey = $this->throttleKey($request, $email);

        // Check rate limit
        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $seconds = RateLimiter::availableIn($throttleKey);
            $this->recordAudit($email, $request, 'lockout');

            throw ValidationException::withMessages([
                'email' => trans('auth.throttle', [
                    'seconds' => $seconds,
                    'minutes' => ceil($seconds / 60),
                ]),
            ]);
        }

        // Find user
        $user = User::where('email', strtolower($email))->first();

        // Constant-time check to prevent timing attacks
        if (! $user) {
            // Perform a dummy hash check with same time cost
            Hash::check($password, Hash::make('dummy_password'));
            $this->handleFailedLogin($throttleKey, $email, $request);
        }

        // Check password
        if ($user && ! Hash::check($password, $user->password)) {
            $this->handleFailedLogin($throttleKey, $email, $request, $user);
        }

        // Check if account is active
        if ($user && ! $user->is_active) {
            $this->handleFailedLogin($throttleKey, $email, $request, $user);
        }

        // Successful login
        RateLimiter::clear($throttleKey);

        // Rehash if needed
        if (Hash::needsRehash($user->password)) {
            $user->password = Hash::make($password);
            $user->save();
        }

        // Update last login info
        $user->last_login_at = now();
        $user->last_login_ip = $request->ip();
        $user->save();

        // Login user
        Auth::login($user, $remember);

        // Regenerate session
        $request->session()->regenerate();

        // Record audit
        $this->recordAudit($email, $request, 'login_success', $user);

        return $user;
    }

    /**
     * Handle failed login attempt.
     *
     * @throws ValidationException
     */
    protected function handleFailedLogin(string $throttleKey, string $email, Request $request, ?User $user = null): void
    {
        RateLimiter::hit($throttleKey, 60);

        $this->recordAudit($email, $request, 'login_failed', $user);

        // Generic error message to prevent user enumeration
        throw ValidationException::withMessages([
            'email' => trans('auth.failed'),
        ]);
    }

    /**
     * Record login audit.
     */
    protected function recordAudit(string $email, Request $request, string $event, ?User $user = null): void
    {
        LoginAudit::create([
            'user_id' => $user?->id,
            'email_attempted' => hash('sha256', strtolower($email)),
            'ip_address' => $request->ip(),
            'user_agent' => substr($request->userAgent() ?? '', 0, 255),
            'event' => $event,
        ]);
    }

    /**
     * Get the rate limiting throttle key for the given request.
     */
    protected function throttleKey(Request $request, string $email): string
    {
        return 'login.'.strtolower($email).'|'.$request->ip();
    }

    /**
     * Logout the user.
     */
    public function logout(Request $request): void
    {
        $user = Auth::user();

        if ($user) {
            $this->recordAudit($user->email, $request, 'logout', $user);
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
