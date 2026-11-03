<?php

namespace App\Http\Controllers\Ortu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the Orang Tua dashboard.
     */
    public function __invoke(Request $request): View
    {
        return view('ortu.dashboard', [
            'user' => $request->user(),
        ]);
    }
}
