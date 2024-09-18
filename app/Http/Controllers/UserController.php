<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {
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
            'password' => 'required|string',
        ]);
    
       
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            
            $request->session()->regenerate();
    
            
            return redirect()->intended('/user_dashboard')->with('success', 'Login successful!');
        }
    
        // if login fails, return back with an error message
        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}

