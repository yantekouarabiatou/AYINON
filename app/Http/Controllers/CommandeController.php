<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Fournisseur;
use App\Models\Produit;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

class CommandeController extends Controller
{
    /**
     * Afficher la liste des commandes.
     */
    public function index()
    {
        $commandes = Commande::with('produit','fournisseur')->get();
        return view('commandes.index', compact('commandes'));
    }

    /**
     * Afficher le formulaire de création d'une commande.
     */
    public function create()
    {
        $produits = Produit::all();
        $fournisseurs=Fournisseur::all();
        $generatedReference = 'CMD-' . strtoupper(uniqid());
        return view('commandes.create', compact('produits','fournisseurs','generatedReference'));

    }

    /**
     * Enregistrer une nouvelle commande.
     */

     public function store(Request $request)
     {
         $request->validate([
             'reference' => 'nullable|string|max:255',
             'produit_id' => 'required|exists:produits,id',
             'fournisseur_id' => 'required|exists:fournisseurs,id',
             'quantite' => 'required|integer|min:1',
             'date_entree' => 'required|date',
             
         ]);
     
         $commande = new Commande();
         $commande->reference = $request->reference;
         $commande->produit_id = $request->produit_id;
         $commande->fournisseur_id = $request->fournisseur_id;
         $commande->quantite = $request->quantite;
         $commande->date_entree = $request->date_entree;
         $commande->save();
     
         return redirect()->route('commandes.index')->with('success', 'Commande ajoutée avec succès.');
     }
     
    

    /**
     * Afficher une commande spécifique.
     */
    public function show($id)
    {
        $commande = Commande::with(['produit', 'fournisseur'])->findOrFail($id);
        return view('commandes.show', compact('commande'));
    }
    

    /**
     * Afficher le formulaire d'édition d'une commande.
     */
    public function edit(Commande $commande)
    {
        $produits = Produit::all();
        $fournisseurs=Fournisseur::all();
        return view('commandes.update', compact('commande', 'produits','fournisseurs'));
    }

    /**
     * Mettre à jour une commande.
     */
    public function update(Request $request, Commande $commande)
    {
        $request->validate([
            'quantite' => 'required|string|max:255',
            'date_entree' => 'nullable|date',
            'produit_id' => 'required|exists:produits,id',
            'fournisseur_id' => 'required|exists:fournisseurs,id',
            'peremption_date' => 'required|date',
            'reference' => 'nullable|string',
            'statut' => 'required|in:Validée,Non validée',
        ]);

        $commande->quantite = $request->quantite;
        $commande->date_entree = $request->date_entree;
        $commande->produit_id = $request->produit_id;
        $commande->fournisseur_id = $request->fournisseur_id;
        $commande->peremption_date = $request->peremption_date;
        $commande->reference = $request->reference ?? $commande->reference;
        $commande->statut = $request->statut;

        $commande->save();

        Alert::success('Succès', 'Commande mise à jour avec succès.');
        return redirect()->route('commandes.index')->with('success', 'Commande mise à jour avec succès.');
    }

    /**
     * Supprimer une commande.
     */
    public function destroy(Commande $commande)
    {
        $commande->delete();
        Alert::success('Succès', 'Commande supprimée avec succès.');
        return redirect()->route('commandes.index');
    }
}
