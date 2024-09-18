<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class FrontendController extends Controller {
    public function index() {
        return Inertia::render('Frontend/index');
    }

    public function user_dashboard() {
        return Inertia::render('Frontend/user_dashboard', [
            'user' => Auth::user(),
        ]);
    }

    public function user_register() {
        return Inertia::render('Frontend/user_register');
    }
}



// return Inertia::render('Welcome', [
//     'canLogin' => Route::has('login'),
//     'canRegister' => Route::has('register'),
//     'laravelVersion' => Application::VERSION,
//     'phpVersion' => PHP_VERSION,
// ]);
// }