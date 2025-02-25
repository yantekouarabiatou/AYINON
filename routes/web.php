<?php

use App\Http\Controllers\CategorieController;
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


Route::get('/categories/create', [CategorieController::class, 'create'])->name('categories.create'); // Formulaire de création
Route::post('/categorie', [CategorieController::class, 'store'])->name('categories.store');        // Enregistrer une catégorie
Route::get('/categorie/{id}/edit', [CategorieController::class, 'edit'])->name('categories.edit'); // Formulaire d'édition
Route::put('/categorie/{id}', [CategorieController::class, 'update'])->name('categories.update');  // Mettre à jour une catégorie
Route::delete('/categorie/{id}', [CategorieController::class, 'destroy'])->name('categories.destroy'); // Supprimer une catégorie
Route::get('/categories/success', [CategorieController::class, 'success'])->name('categories.success');
Route::get('/categorie/create', [CategorieController::class, 'index'])->name('categorie.create');
// Route::middleware(['auth', AdminMiddleware::class])->group(function () {
//     Route::resource('users', UserController::class);
// });
Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class);
});
require __DIR__.'/auth.php';
