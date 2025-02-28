<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', function () {
    return view('auth.login');
});



Route::get('/dashboard', function () {
    $user = Auth::user(); // Récupère l'utilisateur authentifié
    return view('dashboard', compact('user'));
})->middleware(['auth', 'verified', 'user.active'])->name('dashboard');

Route::middleware('auth', 'user.active')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('users', UserController::class);
    // Route::post('/export-users', UserController::class, 'exportUsers')->name('export.users');
    Route::post('/export-users', [UserController::class, 'exportUsers'])->name('export.users');

});
Route::middleware(['auth', 'admin'])->group(function () {
Route::resource('roles', RoleController::class);
});
Route::middleware(['auth', 'admin'])->group(function () {
Route::resource('permissions', PermissionController::class);
});
require __DIR__.'/auth.php';
