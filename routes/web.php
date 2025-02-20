<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('auth.login');
});



Route::get('/dashboard', function () {
    $user = Auth::user(); // Récupère l'utilisateur authentifié
    return view('dashboard', compact('user'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Route::middleware(['auth', AdminMiddleware::class])->group(function () {
//     Route::resource('users', UserController::class);
// });
Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class);
});
require __DIR__.'/auth.php';
