<?php

namespace App\Http\Controllers;

use App\Models\Livraison;
use App\Models\ProduitCommande;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

class LivraisonController extends Controller
{
    /**
     * Afficher la liste des livraisons.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 3); 
    
        $livraisons = Livraison::with(['produitCommande'])
            ->paginate($perPage);
        return view('livraisons.index', compact('livraisons'));
    }

    /**
     * Afficher le formulaire de création d'une livraison.
     */
    public function create()
    {
        $produitCommandes = ProduitCommande::with(['produit', 'commande'])->get();
        return view('livraisons.create', compact('produitCommandes'));
    }

    /**
     * Enregistrer une nouvelle livraison.
     */
    public function store(Request $request)
    {
        $request->validate([
            'produit_commande_id' => 'required|exists:produit_commande,id',
            'dateLivraison' => 'required|date',
        ]);
    
        $livraison = new Livraison();
        $livraison->produit_commande_id = $request->produit_commande_id;
        $livraison->dateLivraison = $request->dateLivraison;
        $livraison->save();
    
        Alert::success('Succès', 'Livraison ajoutée avec succès.');
        return redirect()->route('livraisons.index')->with('success', 'Livraison ajoutée avec succès.');
    }

    /**
     * Afficher une livraison spécifique.
     */
    public function show($id)
    {
        $livraison = Livraison::with('produitCommande')->findOrFail($id);
        return view('livraisons.show', compact('livraison'));
    }

    /**
     * Afficher le formulaire d'édition d'une livraison.
     */
    public function edit(Livraison $livraison)
    {
        $produitCommandes = ProduitCommande::with(['produit', 'commande'])->get();
        return view('livraisons.edit', compact('livraison', 'produitCommandes'));
    }

    /**
     * Mettre à jour une livraison.
     */
    public function update(Request $request, Livraison $livraison)
    {
        $request->validate([
            'produit_commande_id' => 'required|exists:produit_commande,id',
            'dateLivraison' => 'required|date',
        ]);

        $livraison->produit_commande_id = $request->produit_commande_id;
        $livraison->dateLivraison = $request->dateLivraison;
        $livraison->save();

        Alert::success('Succès', 'Livraison mise à jour avec succès.');
        return redirect()->route('livraisons.index')->with('success', 'Livraison mise à jour avec succès.');
    }

    /**
     * Supprimer une livraison.
     */
    public function destroy(Livraison $livraison)
    {
        $livraison->delete();
        Alert::success('Succès', 'Livraison supprimée avec succès.');
        return redirect()->route('livraisons.index');
    }
}