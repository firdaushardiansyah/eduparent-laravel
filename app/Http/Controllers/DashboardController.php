<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Redirect to role-specific dashboard.
     */
    public function __invoke(Request $request): RedirectResponse
    {
        $user = $request->user();

        if ($user->isGuru()) {
            return redirect()->route('guru.dashboard');
        }

        return redirect()->route('ortu.dashboard');
    }
}
