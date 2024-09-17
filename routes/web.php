<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [FrontendController::class, 'index']);
Route::get('/user_dashboard', [FrontendController::class, 'user_dashboard'])->name('user_dashboard');
Route::get('/user_register', [FrontendController::class, 'user_register'])->name('user_register');


// Route to handle the registration form submission
Route::post('/user_register', [FrontendController::class, 'storeUserRegistration'])->name('user_register.store');

// Route to handle the login form submission
Route::post('/', [FrontendController::class, 'loginUser'])->name('login_user');


// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
