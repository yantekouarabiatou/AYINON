<?php

namespace App\Http\Controllers;

use App\Models\ProduitCommande;
use App\Models\Produit;
use App\Models\Commande;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProduitCommandeController extends Controller
{
    /**
     * Afficher la liste des produits-commandes.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10); // Augmenté à 10 par défaut pour une meilleure UX
        
        // Récupération paginée des produits commandés avec leurs relations
        $produitCommandes = ProduitCommande::with(['produit', 'commande'])
            ->orderBy('created_at', 'desc') // Tri par date récente
            ->paginate($perPage);
    
        return view('produit_commandes.index', compact('produitCommandes'));
    }
    /**
     * Afficher le formulaire de création.
     */
    public function create()
    {
        $produits = Produit::all();
        $commandes = Commande::all();
        return view('produit_commandes.create', compact('produits', 'commandes'));
    }

    /**
     * Enregistrer une nouvelle liaison produit-commande.
     */
    public function store(Request $request)
    {
        $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'commande_id' => 'required|exists:commandes,id',
        ]);

        ProduitCommande::create($request->only(['produit_id', 'commande_id']));

        Alert::success('Succès', 'Produit Commandé créé avec succès.');
        return redirect()->route('produitsCommandes.index');
    }

    /**
     * Afficher une liaison spécifique.
     */
    public function show(ProduitCommande $produitCommande)
    {
        return view('produit_commandes.show', compact('produitCommande'));
    }

    /**
     * Formulaire d'édition.
     */
    public function edit(ProduitCommande $produitCommande)
    {
        $produits = Produit::all();
        $commandes = Commande::all();
        return view('produit_commandes.edit', compact('produitCommande', 'produits', 'commandes'));
    }

    /**
     * Mettre à jour une liaison.
     */
    public function update(Request $request, ProduitCommande $produitCommande)
    {
        $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'commande_id' => 'required|exists:commandes,id',
        ]);

        $produitCommande->update($request->only(['produit_id', 'commande_id']));

        Alert::success('Succès', 'ProduitCommande mise à jour avec succès.');
        return redirect()->route('produitCommandes.index');
    }

    /**
     * Supprimer une liaison.
     */
    public function destroy(ProduitCommande $produitCommande)
    {
        $produitCommande->delete();

        Alert::success('Succès', 'ProduitCommande supprimée avec succès.');
        return redirect()->route('produitCommandes.index');
    }

    /**
     * Filtrage dynamique (optionnel).
     */
    public function filter(Request $request)
    {
        $query = ProduitCommande::query();

        if ($request->has('produit_id')) {
            $query->where('produit_id', $request->produit_id);
        }

        if ($request->has('commande_id')) {
            $query->where('commande_id', $request->commande_id);
        }

        $resultats = $query->with(['produit', 'commande'])->get();

        return response()->json($resultats);
    }

    public function searchProduits(Request $request)
    {
        $term = $request->input('q');
        
        $produits = Produit::where('nom', 'like', '%'.$term.'%')
            ->orWhere('reference', 'like', '%'.$term.'%')
            ->select('id', 'nom as text', 'reference')
            ->limit(10)
            ->get();
        
        return response()->json($produits);
    }

    /**
     * Recherche AJAX pour les commandes
     */
    public function searchCommandes(Request $request)
    {
        $term = $request->input('q');
        
        $commandes = Commande::where('reference', 'like', '%'.$term.'%')
            ->orWhereHas('fournisseur', function($query) use ($term) {
                $query->where('nom', 'like', '%'.$term.'%');
            })
            ->select('id', 'reference as text')
            ->limit(10)
            ->get();
        
        return response()->json($commandes);
    }

    // ... (le reste de vos méthodes)
}
