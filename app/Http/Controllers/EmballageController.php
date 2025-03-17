<?php

namespace App\Http\Controllers;

use App\Models\Emballage;
use App\Models\Produit;
use Illuminate\Http\Request;

class EmballageController extends Controller
{
    /**
     * Affiche la liste des emballages.
     */
    public function index()
    {
        // Récupérer tous les emballages avec leurs produits associés
        $emballages = Emballage::with('produit')->get();

        // Retourner la vue avec les emballages
        return view('emballages.index', compact('emballages'));
    }

    /**
     * Affiche le formulaire de création d'un emballage.
     */
    public function create()
    {
        // Récupérer tous les produits pour le formulaire de création
        $produits = Produit::all();

        // Retourner la vue avec les produits
        return view('emballages.create', compact('produits'));
    }

    /**
     * Enregistre un nouvel emballage dans la base de données.
     */
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'prix_achat' => 'required|numeric',
            'prix_unitaire' => 'required|numeric',
            'prix_carton' => 'required|numeric',
        ]);

        // Créer un nouvel emballage
        Emballage::create($request->all());

        // Rediriger vers la liste des emballages avec un message de succès
        return redirect()->route('emballages.index')
                         ->with('success', 'Emballage créé avec succès.');
    }

    /**
     * Affiche les détails d'un emballage spécifique.
     */
    public function show(Emballage $emballage)
    {
        // Retourner la vue avec les détails de l'emballage
        return view('emballages.show', compact('emballage'));
    }

    /**
     * Affiche le formulaire de modification d'un emballage.
     */
    public function edit(Emballage $emballage)
    {
        // Récupérer tous les produits pour le formulaire de modification
        $produits = Produit::all();

        // Retourner la vue avec l'emballage et les produits
        return view('emballages.edit', compact('emballage', 'produits'));
    }

    /**
     * Met à jour un emballage dans la base de données.
     */
    public function update(Request $request, Emballage $emballage)
    {
        // Valider les données du formulaire
        $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'prix_achat' => 'required|numeric',
            'prix_unitaire' => 'required|numeric',
            'prix_carton' => 'required|numeric',
        ]);

        // Mettre à jour l'emballage
        $emballage->update($request->all());

        // Rediriger vers la liste des emballages avec un message de succès
        return redirect()->route('emballages.index')
                         ->with('success', 'Emballage mis à jour avec succès.');
    }

    /**
     * Supprime un emballage de la base de données.
     */
    public function destroy(Emballage $emballage)
    {
        // Supprimer l'emballage
        $emballage->delete();

        // Rediriger vers la liste des emballages avec un message de succès
        return redirect()->route('emballages.index')
                         ->with('success', 'Emballage supprimé avec succès.');
    }
}