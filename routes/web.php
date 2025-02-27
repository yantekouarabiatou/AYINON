<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Produit;
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
Route::post('/categories', [CategorieController::class, 'store'])->name('categories.store');        // Enregistrer une catégorie
Route::get('/categories/{id}/edit', [CategorieController::class, 'edit'])->name('categories.edit'); // Formulaire d'édition
Route::put('/categories/{id}', [CategorieController::class, 'update'])->name('categories.update');  // Mettre à jour une catégorie
Route::delete('/categories/{id}', [CategorieController::class, 'destroy'])->name('categories.destroy'); // Supprimer une catégorie
Route::get('/categories/success', [CategorieController::class, 'success'])->name('categories.success');
Route::get('/categories', [CategorieController::class, 'index'])->name('categories.index');
Route::get('/categories/{id}', [CategorieController::class, 'show'])->name('categories.show');

Route::get('/produits/index', [ProduitController::class, 'index'])->name('produits.index'); // Formulaire de création
Route::get('/produit/create', [ProduitController::class, 'create'])->name('produits.create'); // Formulaire de création
Route::post('/produits', [ProduitController::class, 'store'])->name('produits.store');        // Enregistrer une catégorie
Route::get('/produit/{produit}/edit', [ProduitController::class, 'edit'])->name('produits.edit');
Route::put('/produit/{produit}', [ProduitController::class, 'update'])->name('produits.update');
Route::post('/produits/filter', [ProduitController::class, 'filterProduits']);
Route::delete('/produit/{produit}', [ProduitController::class, 'destroy'])->name('produits.destroy');
Route::get('/produit/{produit}', [ProduitController::class, 'show'])->name('produits.show');

Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class);
});
require __DIR__.'/auth.php';
