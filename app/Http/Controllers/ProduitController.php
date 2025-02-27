<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;

class ProduitController extends Controller
{
    /**
     * Afficher la liste des produits.
     */
    public function index()
    {
        // Récupérer les produits avec leurs catégories
        $produits = Produit::with('categories')->get();
    
        // Récupérer les produits dont la quantité est inférieure ou égale au seuil d'alerte
        $alertProduits = $produits->filter(function ($produit) {
            return $produit->quantite <= $produit->stock_alert;
        });
    
        // Passer les produits et les produits avec alerte à la vue
        return view('produits.index', compact('produits', 'alertProduits'));
    }



    /**
     * Afficher le formulaire de création d'un produit.
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('produits.create', compact('categories'));
    }

    /**
     * Enregistrer un nouveau produit.
     */
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'categorie_id' => 'required|exists:categories,id',
            'prix' => 'required|numeric',
            'quantite' => 'required|integer',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation de l'image
            'stock_alert' => 'nullable|integer',
        ]);
    
        // Upload de la photo
        $photoPath = null;
        if ($request->hasFile('photo')) {
            // Stocke l'image dans storage/app/public/produits et enregistre le chemin sans "public/"
            $photoPath = $request->file('photo')->store('produits', 'public');
        }
    
        // Création du produit
        Produit::create([
            'name' => $request->name,
            'description' => $request->description,
            'categorie_id' => $request->categorie_id,
            'prix' => $request->prix,
            'quantite' => $request->quantite,
            'photo' => $photoPath, // Chemin corrigé
            'stock_alert' => $request->stock_alert,
        ]);
    
        return redirect()->route('produits.index')->with('success', 'Produit créé avec succès.');
    }
    
    

    /**
     * Afficher un produit spécifique.
     */
    public function show(Produit $produit)
    {
        return view('produits.show', compact('produit'));
    }

    /**
     * Afficher le formulaire d'édition d'un produit.
     */
    public function edit(Produit $produit)
{
    // Récupérer toutes les catégories
    $categories = Categorie::all();

    // Retourner la vue avec le produit et les catégories
    return view('produits.update', compact('produit', 'categories'));
}


    /**
     * Mettre à jour un produit.
     */
    public function update(Request $request, Produit $produit)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'categorie_id' => 'required|exists:categories,id',
            'prix' => 'required|numeric',
            'quantite' => 'required|integer',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation de l'image
        ]);
    
        // Mettre à jour les champs qui ne sont pas liés à l'image
        $produit->name = $request->name;
        $produit->description = $request->description;
        $produit->categorie_id = $request->categorie_id;
        $produit->prix = $request->prix;
        $produit->quantite = $request->quantite;
        $produit->stock_alert = $request->stock_alert;
    
        // Vérifier si une nouvelle photo est uploadée
        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne photo si elle existe
            if ($produit->photo && file_exists(storage_path('app/' . $produit->photo))) {
                unlink(storage_path('app/' . $produit->photo));
            }
    
            // Enregistrer la nouvelle photo
            $photoPath = $request->file('photo')->store('public/photos');
            $produit->photo = $photoPath;
        }
    
        // Sauvegarder le produit mis à jour
        $produit->save();
         // Si une erreur se produit
        Alert::success('Succès', 'Produit mis à jour avec succès.');
        return redirect()->route('produits.index')->with('success', 'Produit mis à jour avec succès.');
    }
    


    /**
     * Supprimer un produit.
     */
    public function destroy(Produit $produit)
    {
        // Suppression du produit
        $produit->delete();
    
        // Redirection ou autre action
        return redirect()->route('produits.index');
    }
    

    public function filterProducts(Request $request)
{
    $query = Produit::query();

    // Apply search filter
    if ($request->has('search') && !empty($request->search)) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    // Apply category filter
    if ($request->has('category') && !empty($request->category)) {
        $query->where('category_id', $request->category);
    }

    // Get the filtered products
    $products = $query->get();

    // Return the data as JSON
    return response()->json($products);
}

}
