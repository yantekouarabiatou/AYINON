<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\User;
use App\Models\Vente;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VenteController extends Controller
{
    /**
     * Afficher la liste des ventes.
     */
    public function index()
    {
        // Récupérer uniquement les ventes de l'utilisateur connecté
       // Dans le contrôleur
        $ventes = Vente::where('user_id', Auth::id())->with('vente_details')->get(); // Utiliser 'vente_details' ici
        return view('ventes.index', compact('ventes'));
    }

    /**
     * Afficher le formulaire de création d'une vente.
     */
    public function create()
    {
        // Pas besoin de récupérer une vente existante ici
        $produits = Produit::all();  // Récupérer tous les produits
        
        return view('ventes.create', compact('produits'));  // Passer les produits à la vue
    }
    


    /**
     * Enregistrer une nouvelle vente.
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            Alert::error('Error', 'Veuillez vous connecter avant de créer une vente.');
            return redirect()->route('login');
        }
    
        // Validation des données
        $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'quantite' => 'required|numeric|min:1',
        ]);
    
        // Créer la vente initiale
        $vente = Vente::create([
            'user_id' => Auth::id(),
            'montant_total' => 0, // Le total sera mis à jour après l'ajout des détails
        ]);
    
        // Ajouter le premier détail de la vente
        $produit = Produit::find($request->produit_id);
        $montant_total = $produit->prix * $request->quantite;
    
        $vente_detail = $vente->vente_details()->create([
            'produit_id' => $request->produit_id,
            'quantite' => $request->quantite,
            'prix_unitaire' => $produit->prix,
            'montant_total' => $montant_total,
        ]);
    
        // Mettre à jour le montant total de la vente
        $vente->update([
            'montant_total' => $vente->vente_details->sum('montant_total'),
        ]);
    
        return redirect()->route('ventes.show', $vente)->with('success', 'Vente créée. Ajoutez d\'autres produits.');
    }
    

    /**
     * Afficher une vente spécifique.
     */
    public function show(Vente $vente)
    {
        $vente->load('user', 'details.produit');
        return view('ventes.show', compact('vente'));
    }

    /**
     * Afficher le formulaire d'édition d'une vente.
     */
    public function edit(Vente $vente)
    {
        return view('ventes.edit', compact('vente'));
    }

    /**
     * Mettre à jour une vente.
     */
    public function update(Request $request, Vente $vente)
    {
        $request->validate([
            'montant_total' => 'required|numeric',
        ]);

        $vente->update([
            'montant_total' => $request->montant_total,
        ]);

        Alert::success('Succès', 'Vente mise à jour avec succès.');
        return redirect()->route('ventes.index');
    }

    /**
     * Supprimer une vente.
     */
    public function destroy(Vente $vente)
    {
        if ($vente->user_id !== Auth::id()) {
            Alert::error('Erreur', 'Vous ne pouvez pas supprimer cette vente.');
            return redirect()->route('ventes.index');
        }

        $vente->delete();
        Alert::success('Succès', 'Vente supprimée avec succès.');
        return redirect()->route('ventes.index');
    }

    /**
     * Filtrer les ventes.
     */
    public function filterventes(Request $request)
    {
        $query = Vente::where('user_id', Auth::id()); // Sécurisation de l'accès

        if ($request->has('search') && !empty($request->search)) {
            $query->where('id', 'like', '%' . $request->search . '%');
        }

        $ventes = $query->with('user')->get();
        return response()->json($ventes);
    }
}
