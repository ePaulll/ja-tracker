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
    return Inertia::render('Frontend/user_dashboard');
 
    }


    public function user_register() {
    return Inertia::render('Frontend/user_register');
    }

    //user registration
    public function storeUserRegistration(Request $request) {
    // validate the incoming request data
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
    ]);

    // Create a new user or handle registration logic
    User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']),
    ]);

    // Return a response (JSON, redirect, etc.)
    return response()->json(['message' => 'User registered successfully.']);
    } 

    //user login
    public function loginUser(Request $request) {
        // validate the form data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);
    
       
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            
            $request->session()->regenerate();
    
            
            return redirect()->intended('/user_dashboard')->with('success', 'Login successful!');
        }
    
        // if login fails, return back with an error message
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

}



// return Inertia::render('Welcome', [
//     'canLogin' => Route::has('login'),
//     'canRegister' => Route::has('register'),
//     'laravelVersion' => Application::VERSION,
//     'phpVersion' => PHP_VERSION,
// ]);
// }