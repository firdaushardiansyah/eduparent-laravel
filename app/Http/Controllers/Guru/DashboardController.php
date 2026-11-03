<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the Guru dashboard.
     */
    public function __invoke(Request $request): View
    {
        return view('guru.dashboard', [
            'user' => $request->user(),
        ]);
    }
}
