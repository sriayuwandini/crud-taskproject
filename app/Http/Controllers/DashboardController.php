<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role == 'admin') {
            return view('admin.dashboard');
        } elseif ($user->role == 'user') {
            return view('user.dashboard');
        } else {
            abort(403, 'Unauthorized action.');
        }
    }
}

