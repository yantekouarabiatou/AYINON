<?php
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\FactureCommandeController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TypeFournisseurController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VenteController;
// use App\Http\Controllers\VenteControllers;
use App\Http\Controllers\VenteDetailController;
use App\Models\Produit;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\EmballageController;
use App\Http\Controllers\LivraisonController;
use App\Http\Controllers\ProduitCommandeController;

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
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);

});
Route::resource('ventes', VenteController::class);
// Route::get('/factures/{venteId}', [VenteController::class, 'showFacture'])->name('factures.invoice');
// Route::get('/factures/{venteId}', [VenteController::class, 'genererFacture'])->name('factures.invoice');
Route::get('/factures/{venteId}/show', [VenteController::class, 'showFacture'])->name('factures.show');


Route::get('/categories/create', [CategorieController::class, 'create'])->name('categories.create'); // Formulaire de création
Route::post('/categories', [CategorieController::class, 'store'])->name('categories.store');        // Enregistrer une catégorie
Route::get('/categories/{id}/edit', [CategorieController::class, 'edit'])->name('categories.edit'); // Formulaire d'édition
Route::put('/categories/{id}', [CategorieController::class, 'update'])->name('categories.update');  // Mettre à jour une catégorie
Route::delete('/categories/{id}', [CategorieController::class, 'destroy'])->name('categories.destroy'); // Supprimer une catégorie
Route::get('/categories/success', [CategorieController::class, 'success'])->name('categories.success');
Route::get('/categories', [CategorieController::class, 'index'])->name('categories.index');
Route::get('/categories/{id}', [CategorieController::class, 'show'])->name('categories.show');


Route::get('/produits/index', [ProduitController::class, 'index'])->name('produits.index'); // Formulaire de création
Route::get('/produits/create', [ProduitController::class, 'create'])->name('produits.create'); // Formulaire de création
Route::post('/produits', [ProduitController::class, 'store'])->name('produits.store');        // Enregistrer une catégorie
Route::get('/produits/{produit}/edit', [ProduitController::class, 'edit'])->name('produits.edit');
Route::put('/produits/{produit}', [ProduitController::class, 'update'])->name('produits.update');
Route::post('/produits/filter', [ProduitController::class, 'filterProduits']);
Route::delete('/produits/{produit}', [ProduitController::class, 'destroy'])->name('produits.destroy');
Route::get('/produits/{produit}', [ProduitController::class, 'show'])->name('produits.show');
Route::get('/layout', [ProduitController::class, 'layout'])->name('produits.layout');
Route::resource('livraisons', LivraisonController::class);
Route::get('/Tfournisseurs/create', [TypeFournisseurController::class, 'create'])->name('Tfournisseurs.create'); // Formulaire de création
Route::post('/Tfournisseurs', [TypeFournisseurController::class, 'store'])->name('Tfournisseurs.store');        // Enregistrer une catégorie
Route::get('/Tfournisseurs/{id}/edit', [TypeFournisseurController::class, 'edit'])->name('Tfournisseurs.edit'); // Formulaire d'édition
Route::put('/Tfournisseurs/{id}', [TypeFournisseurController::class, 'update'])->name('Tfournisseurs.update');  // Mettre à jour une catégorie
Route::delete('/Tfournisseurs/{id}', [TypeFournisseurController::class, 'destroy'])->name('Tfournisseurs.destroy'); // Supprimer une catégorie
Route::get('/Tfournisseurs/success', [TypeFournisseurController::class, 'success'])->name('Tfournisseurs.success');
Route::get('/Tfournisseurs', [TypeFournisseurController::class, 'index'])->name('Tfournisseurs.index');
Route::get('/Tfournisseurs/{id}', [TypeFournisseurController::class, 'show'])->name('Tfournisseurs.show');
// routes/web.php


Route::get('/fournisseurs/index', [FournisseurController::class, 'index'])->name('fournisseurs.index'); // Formulaire de création
Route::get('/fournisseurs/create', [FournisseurController::class, 'create'])->name('fournisseurs.create'); // Formulaire de création
Route::post('/fournisseurs', [FournisseurController::class, 'store'])->name('fournisseurs.store');        // Enregistrer une catégorie
Route::get('/fournisseurs/{fournisseur}/edit', [FournisseurController::class, 'edit'])->name('fournisseurs.edit');
Route::put('/fournisseurs/{fournisseur}', [FournisseurController::class, 'update'])->name('fournisseurs.update');
Route::post('/fournisseurs/filter', [FournisseurController::class, 'filterFournisseurs']);
Route::delete('/fournisseurs/{fournisseur}', [FournisseurController::class, 'destroy'])->name('fournisseurs.destroy');
Route::get('/fournisseurs/{fournisseur}', [FournisseurController::class, 'show'])->name('fournisseurs.show');


Route::get('/commandes/index', [CommandeController::class, 'index'])->name('commandes.index'); // Formulaire de création
Route::get('/commandes/create', [CommandeController::class, 'create'])->name('commandes.create'); // Formulaire de création
Route::post('/commandes', [CommandeController::class, 'store'])->name('commandes.store');        // Enregistrer une catégorie
Route::get('commandes/{commande}/edit', [CommandeController::class, 'edit'])->name('commandes.edit');
Route::put('/commandes/{commande}', [CommandeController::class, 'update'])->name('commandes.update');
Route::post('/commandes/filter', [CommandeController::class, 'filterCommandes']);
Route::delete('/commandes/{commande}', [CommandeController::class, 'destroy'])->name('commandes.destroy');
Route::get('/commandes/{commande}', [CommandeController::class, 'show'])->name('commandes.show');


Route::get('/factureCommandes/index', [FactureCommandeController::class, 'index'])->name('factureCommandes.index'); // Formulaire de création
Route::get('/factureCommandes/create', [FactureCommandeController::class, 'create'])->name('factureCommandes.create'); // Formulaire de création
Route::post('/factureCommandes', [FactureCommandeController::class, 'store'])->name('factureCommandes.store');        // Enregistrer une catégorie
Route::get('/factureCommandes/{factureCommande}/edit', [FactureCommandeController::class, 'edit'])->name('factureCommandes.edit');
Route::put('/factureCommandes/{factureCommande}', [FactureCommandeController::class, 'update'])->name('factureCommandes.update');
Route::post('/factureCommandes/filter', [FactureCommandeController::class, 'filterProduits']);
Route::delete('/factureCommandes/{factureCommande}', [FactureCommandeController::class, 'destroy'])->name('factureCommandes.destroy');
Route::get('/factureCommandes/{factureCommande}', [FactureCommandeController::class, 'show'])->name('factureCommandes.show');

// Route::get('/ventes/index', [VenteController::class, 'index'])->name('ventes.index'); // Formulaire de création
//Route::get('/ventes/create', [VenteController::class, 'create'])->name('ventes.create'); // Formulaire de création
// Route::post('/ventes', [VenteController::class, 'store'])->name('ventes.store');        // Enregistrer une catégorie
// Route::get('/ventes/{ventes}/edit', [VenteController::class, 'edit'])->name('ventes.edit');
// Route::put('/ventes/{ventes}', [VenteController::class, 'update'])->name('ventes.update');
// Route::post('/ventes/filter', [VenteController::class, 'filterProduits']);
// Route::delete('/ventes/{ventes}', [VenteController::class, 'destroy'])->name('ventes.destroy');
// Route::get('/ventes/{ventes}', [VenteController::class, 'show'])->name('ventes.show');
Route::get('/ventes/jour', [VenteController::class, 'ventesDuJour'])->name('ventes.jour');
Route::get('/ventes/archives', [VenteController::class, 'ventesArchives'])->name('ventes.archives');

Route::resource('ventes', VenteController::class);

// Routes pour les détails de vente
Route::get('detailsVentes/{vente_id}/index', [VenteDetailController::class, 'index'])->name('detailsVentes.index');
Route::get('/detailsVentes/create', [VenteDetailController::class, 'create'])->name('detailsVentes.create');Route::post('/detailsVentes', [VenteDetailController::class, 'store'])->name('detailsVentes.store');
Route::get('/detailsVentes/{detailsVente}/edit', [VenteDetailController::class, 'edit'])->name('detailsVentes.edit');
Route::put('/detailsVentes/{detailsVente}', [VenteDetailController::class, 'update'])->name('detailsVentes.update');
Route::delete('/detailsVentes/{detailsVente}', [VenteDetailController::class, 'destroy'])->name('detailsVentes.destroy');
Route::get('/detailsVentes/{detailsVente}', [VenteDetailController::class, 'show'])->name('detailsVentes.show');
Route::get('/factures/{vente}/download', [VenteDetailController::class, 'downloadInvoice'])
     ->name('invoices.download');
// Route pour afficher les détails d'une vente spécifique
Route::get('/ventes/{vente_id}/details', [VenteDetailController::class, 'detailsParVente'])
    ->name('ventes.details');

// Routes pour EmballageController
Route::resource('emballages', EmballageController::class);

// Routes pour ProduitCommandeController
Route::get('/produitsCommandes', [ProduitCommandeController::class, 'index'])->name('produitsCommandes.index');
Route::get('/produitsCommandes/create', [ProduitCommandeController::class, 'create'])->name('produitsCommandes.create');
Route::post('/produitsCommandes', [ProduitCommandeController::class, 'store'])->name('produitsCommandes.store');
Route::get('/produitsCommandes/{produitCommande}', [ProduitCommandeController::class, 'show'])->name('produitsCommandes.show');
Route::get('/produitsCommandes/{produitCommande}/edit', [ProduitCommandeController::class, 'edit'])->name('produitsCommandes.edit');
Route::put('/produitsCommandes/{produitCommande}', [ProduitCommandeController::class, 'update'])->name('produitsCommandes.edit');
Route::delete('/produitsCommandes/{produitCommande}', [ProduitCommandeController::class, 'destroy'])->name('produitsCommandes.destroy');
Route::get('/produits/search', [ProduitCommandeController::class, 'searchProduits'])->name('produits.search');
Route::get('/commandes/search', [ProduitCommandeController::class, 'searchCommandes'])->name('commandes.search');
Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class);
});
require __DIR__.'/auth.php';
