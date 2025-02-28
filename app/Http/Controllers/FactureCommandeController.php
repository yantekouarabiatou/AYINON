<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Facture_commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class FactureCommandeController extends Controller
{
    /**
     * Afficher la liste des factureCommandes.
     */
    public function index()
    {
        // Récupérer les factureCommandes avec leurs commandes
        $factureCommandes = Facture_commande::with('commande')->get();

        // Transformer la collection pour inclure les URLs des médias
        $factureCommandes = $factureCommandes->map(function ($factureCommande) {
            $mediaUrl = $factureCommande->getFirstMediaUrl('factureCommandes'); // Utiliser le nom de la collection 'factureCommandes'

            // Retourner les données transformées
            return [
                'id' => $factureCommande->id,
                'commande_id' => $factureCommande->commande_id,
                'commande' => $factureCommande->commande, // Inclure les détails de la commande
                'recu' => $mediaUrl // Assurez-vous que c'est l'URL correcte
            ];
        });

        // Passer les factureCommandes à la vue
        return view('factures.index', compact('factureCommandes'));
    }

    /**
     * Afficher le formulaire de création d'un factureCommande.
     */
    public function create()
    {
        $commandes = Commande::all();
        return view('factures.create', compact('commandes'));
    }

    /**
     * Enregistrer un nouveau factureCommande.
     */
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'commande_id' => 'required|exists:commandes,id',
            'recu' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation de l'image
        ]);

        // Créer le factureCommande
        $factureCommande = Facture_commande::create($request->except('recu'));

        // Ajouter l'image si elle existe
        if ($request->hasFile('recu')) {
            $factureCommande->addMediaFromRequest('recu')
                ->usingFileName($factureCommande->id . '-' . $request->file('recu')->getClientOriginalName()) // Nom unique basé sur l'ID du factureCommande
                ->toMediaCollection('factureCommandes', 'public');
        }

        // Alert de succès
        Alert::success('Succès', 'FactureCommande créée avec succès.');
        return redirect()->route('factureCommandes.index')->with('success', 'FactureCommande créée avec succès.');
    }

    /**
     * Afficher un factureCommande spécifique.
     */
    public function show(Facture_commande $factureCommande)
    {
        return view('factures.show', compact('factureCommande'));
    }

    /**
     * Afficher le formulaire d'édition d'un factureCommande.
     */
    public function edit(Facture_commande $factureCommande)
    {
        // Récupérer toutes les commandes
        $commandes = Commande::all();

        // Retourner la vue avec le factureCommande et les commandes
        return view('factures.update', compact('factureCommande', 'commandes'));
    }

    /**
     * Mettre à jour un factureCommande.
     */
    public function update(Request $request, Facture_commande $factureCommande)
    {
        // Validation des données
        $request->validate([
            'commande_id' => 'required|exists:commandes,id',
            'recu' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation de l'image
        ]);

        // Mettre à jour le factureCommande
        $factureCommande->update($request->except('recu'));

        // Ajouter ou mettre à jour l'image si elle existe
        if ($request->hasFile('recu')) {
            // Supprimer l'ancienne image si elle existe
            $factureCommande->clearMediaCollection('factureCommandes');

            // Ajouter la nouvelle image
            $factureCommande->addMedia($request->file('recu'))
                ->usingFileName($factureCommande->id . '-' . $request->file('recu')->getClientOriginalName()) // Nom unique basé sur l'ID du factureCommande
                ->toMediaCollection('factureCommandes', 'public');
        }

        // Alert de succès
        Alert::success('Succès', 'FactureCommande mis à jour avec succès.');
        return redirect()->route('factureCommandes.index')->with('success', 'FactureCommande mis à jour avec succès.');
    }

    /**
     * Supprimer un factureCommande.
     */
    public function destroy(Facture_commande $factureCommande)
    {
        // Supprimer le factureCommande
        $factureCommande->delete();

        // Alert de succès
        Alert::success('Succès', 'FactureCommande supprimée avec succès.');

        // Redirection
        return redirect()->route('factureCommandes.index');
    }

    /**
     * Filtrer les factureCommandes.
     */
    public function filterFactures(Request $request)
    {
        $query = Facture_commande::query();

        // Appliquer le filtre de recherche par commande_id
        if ($request->has('search') && !empty($request->search)) {
            $query->where('commande_id', 'like', '%' . $request->search . '%');
        }

        // Appliquer un autre filtre, par exemple pour le reçu
        if ($request->has('recu') && !empty($request->recu)) {
            $query->where('recu', 'like', '%' . $request->recu . '%');
        }

        // Obtenez les résultats filtrés
        $factures = $query->get();

        // Retourner les résultats sous forme de JSON
        return response()->json($factures);
    }
}