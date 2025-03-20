<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Log;
use App\Models\HistoriqueStock;


class ProduitController extends Controller
{
    /**
     * Constructeur pour partager les produits en alerte avec toutes les vues.
     */
    public function __construct()
    {
        View::share('alertProduits', $this->getProduitsEnAlerte());
    }

    /**
     * Récupérer les produits en alerte (quantité <= stock_alert).
     */
    private function getProduitsEnAlerte()
    {
        return Produit::whereColumn('quantite', '<=', 'stock_alert')->get();
    }

    /**
     * Afficher la liste des produits.
     */
    public function index()
    {
        $produits = Produit::with('categories')->get();

        $produits->each(function ($produit) {
            $produit->photo = $produit->getFirstMediaUrl('produits');
        });

        return view('produits.index', compact('produits'));
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
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'categorie_id' => 'required|exists:categories,id',
        'prix' => 'required|numeric',
        'quantite' => 'required|numeric',
        'stock_alert' => 'required|numeric',
        'photo' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
    ]);

    $produit = Produit::create($request->except('photo'));

    // Enregistrer l'entrée dans l'historique des stocks
    HistoriqueStock::create([
        'produit_id' => $produit->id,
        'type_mouvement' => 'entrée',
        'quantite' => $request->quantite,
        'date_mouvement' => now(),
    ]);

    if ($request->hasFile('photo')) {
        $produit->addMediaFromRequest('photo')
            ->usingFileName($produit->id . '-' . $request->file('photo')->getClientOriginalName())
            ->toMediaCollection('produits', 'public');
    }

    Alert::success('Succès', 'Produit ajouté avec succès.');
    return redirect()->route('produits.index');
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
        $categories = Categorie::all();
        return view('produits.update', compact('produit', 'categories'));
    }

    /**
     * Mettre à jour un produit.
     */
    public function update(Request $request, Produit $produit)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'categorie_id' => 'required|exists:categories,id',
            'prix' => 'required|numeric',
            'quantite' => 'required|integer',
            'stock_alert' => 'required|integer',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $produit->update($request->except('photo'));

        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne image
            $produit->clearMediaCollection('produits');

            // Ajouter la nouvelle image
            $produit->addMediaFromRequest('photo')
                ->usingFileName($produit->id . '-' . $request->file('photo')->getClientOriginalName())
                ->toMediaCollection('produits', 'public');
        }

        Alert::success('Succès', 'Produit mis à jour avec succès.');
        return redirect()->route('produits.index');
    }

    /**
     * Supprimer un produit.
     */
    public function destroy(Produit $produit)
    {
        $produit->clearMediaCollection('produits');
        $produit->delete();

        Alert::success('Succès', 'Produit supprimé avec succès.');
        return redirect()->route('produits.index');
    }

    /**
     * Filtrer les produits par nom ou catégorie.
     */
    public function filterproduits(Request $request)
    {
        $query = Produit::query();

        if ($request->has('search') && !empty($request->search)) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->has('category') && !empty($request->category)) {
            $query->where('categorie_id', $request->category);
        }

        $produits = $query->get();

        return response()->json($produits);
    }
}
