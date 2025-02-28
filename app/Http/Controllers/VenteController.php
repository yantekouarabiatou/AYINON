<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\User;
use App\Models\Vente;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class VenteController extends Controller
{
    /**
     * Afficher la liste des ventes.
     */
    public function index()
    {
        // Récupérer les ventes avec leurs commandes
        $ventes = Vente::with('user', 'produit')->get();
        // Passer les ventes à la vue
        return view('ventes.index', compact('ventes'));
    }

    /**
     * Afficher le formulaire de création d'une vente.
     */
    public function create()
{
    // Récupérer tous les utilisateurs et produits
    $users = User::all();
    $produits = Produit::all();
    
    // Vérifier si des utilisateurs ou des produits existent
    if ($users->isEmpty() || $produits->isEmpty()) {
        return redirect()->route('ventes.index')->with('error', 'Aucun utilisateur ou produit trouvé.');
    }

    return view('ventes.create', compact('users', 'produits'));
}


    /**
     * Enregistrer une nouvelle vente.
     */
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'produit_id' => 'required|exists:produits,id',
            'montant_total' => 'required|numeric',
        ]);
    
        // Création de la vente
        Vente::create([
            'user_id' => $request->user_id,
            'produit_id' => $request->produit_id,
            'montant_total' => $request->montant_total, 
        ]);
    
        return redirect()->route('ventes.index')->with('success', 'Vente créée avec succès.');
    }
    
    /**
     * Afficher une vente spécifique.
     */
    public function show(Vente $vente)
    {
        $vente->load('user', 'produit'); // Charge les relations avant d'envoyer à la vue
        return view('ventes.show', compact('vente'));
    }
    

    /**
     * Afficher le formulaire d'édition d'une vente.
     */
    public function edit(Vente $vente)
    {
        // Récupérer tous les utilisateurs et produits
        $user = User::all();
        $produit = Produit::all();
        // Retourner la vue avec la vente, les utilisateurs, et les produits
        return view('ventes.update', compact('vente', 'user', 'produit'));
    }

    /**
     * Mettre à jour une vente.
     */
    public function update(Request $request, Vente $vente)
    {
        // Validation des données
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'produit_id' => 'required|exists:produits,id',
            'montant_total' => 'required|numeric',
        ]);
    
        // Mise à jour de la vente
        $vente->user_id = $request->user_id;
        $vente->produit_id = $request->produit_id;
        $vente->montant_total = $request->montant_total;
    
        // Sauvegarder la vente mise à jour
        $vente->save();
        
        // Alerte de succès
        Alert::success('Succès', 'Vente mise à jour avec succès.');
        return redirect()->route('ventes.index')->with('success', 'Vente mise à jour avec succès.');
    }
    
    /**
     * Supprimer une vente.
     */
    public function destroy(Vente $vente)
    {
        // Suppression de la vente
        $vente->delete();
        Alert::success('Succès', 'Vente supprimée avec succès.');
        // Redirection ou autre action
        return redirect()->route('ventes.index');
    }

    /**
     * Filtrer les ventes.
     */
    public function filterventes(Request $request)
    {
        $query = Vente::query();

        // Appliquer le filtre de recherche par commande_id
        if ($request->has('search') && !empty($request->search)) {
            $query->where('commande_id', 'like', '%' . $request->search . '%');
        }

        // Appliquer un autre filtre, par exemple pour le reçu
        if ($request->has('recu') && !empty($request->recu)) {
            $query->where('recu', 'like', '%' . $request->recu . '%');
        }

        // Obtenez les résultats filtrés
        $ventes = $query->get();

        // Retourner les résultats sous forme de JSON
        return response()->json($ventes);
    }
}
