<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use App\Models\TypeFournisseur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class FournisseurController extends Controller
{
    /**
     * Afficher la liste des fournisseurs.
     */
    public function index()
    {
        // Récupérer les fournisseurs avec leurs catégories
        $fournisseurs = Fournisseur::with('typeFournisseur')->get();

        // Transformer la collection pour inclure les URLs des médias
        $fournisseurs = $fournisseurs->map(function ($fournisseur) {
            $mediaUrl = $fournisseur->getFirstMediaUrl('fournisseurs'); // Utiliser le nom de la collection 'fournisseurs'

            // Retourner les données transformées
            return [
                'id' => $fournisseur->id,
                'nom' => $fournisseur->nom,
                'type_id' => $fournisseur->type_id,
                'reseau' => $fournisseur->reseau,
                'logo' => $mediaUrl // Assurez-vous que c'est l'URL correcte
            ];
        });

        // Passer les fournisseurs à la vue
        return view('fournis.index', compact('fournisseurs'));
    }

    /**
     * Afficher le formulaire de création d'un fournisseur.
     */
    public function create()
    {
        // Récupérer toutes les catégories de fournisseurs
        $Tfournisseurs = TypeFournisseur::all();
        return view('fournis.create', compact('Tfournisseurs'));
    }

    /**
     * Enregistrer un nouveau fournisseur.
     */
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
            'reseau' => 'nullable|string',
            'type_id' => 'required|exists:type_fournisseurs,id',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation de l'image
        ]);

        // Créer le fournisseur
        $fournisseur = Fournisseur::create($request->except('logo'));

        // Ajouter l'image si elle existe
        if ($request->hasFile('logo')) {
            $fournisseur->addMediaFromRequest('logo')
                ->usingFileName($fournisseur->id . '-' . $request->file('logo')->getClientOriginalName()) // Nom unique basé sur l'ID du fournisseur
                ->toMediaCollection('fournisseurs', 'public');
        }

        // Redirection avec message de succès
        Alert::success('Succès', 'Fournisseur créé avec succès.');
        return redirect()->route('fournisseurs.index')->with('success', 'Fournisseur créé avec succès.');
    }

    /**
     * Afficher un fournisseur spécifique.
     */
    public function show(Fournisseur $fournisseur)
    {
        return view('fournis.show', compact('fournisseur'));
    }

    /**
     * Afficher le formulaire d'édition d'un fournisseur.
     */
    public function edit(Fournisseur $fournisseur)
    {
        // Récupérer toutes les catégories de fournisseurs
        $Tfournisseurs = TypeFournisseur::all();

        // Retourner la vue avec le fournisseur et les catégories
        return view('fournis.update', compact('fournisseur', 'Tfournisseurs'));
    }

    /**
     * Mettre à jour un fournisseur.
     */
    public function update(Request $request, Fournisseur $fournisseur)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
            'reseau' => 'nullable|string',
            'type_id' => 'required|exists:type_fournisseurs,id',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation de l'image
        ]);

        // Mettre à jour le fournisseur
        $fournisseur->update($request->except('logo'));

        // Ajouter ou mettre à jour l'image si elle existe
        if ($request->hasFile('logo')) {
            // Supprimer l'ancienne image si elle existe
            $fournisseur->clearMediaCollection('fournisseurs');

            // Ajouter la nouvelle image
            $fournisseur->addMedia($request->file('logo'))
                ->usingFileName($fournisseur->id . '-' . $request->file('logo')->getClientOriginalName()) // Nom unique basé sur l'ID du fournisseur
                ->toMediaCollection('fournisseurs', 'public');
        }

        // Alert de succès
        Alert::success('Succès', 'Fournisseur mis à jour avec succès.');
        return redirect()->route('fournisseurs.index')->with('success', 'Fournisseur mis à jour avec succès.');
    }

    /**
     * Supprimer un fournisseur.
     */
    public function destroy(Fournisseur $fournisseur)
    {
        // Supprimer le fournisseur
        $fournisseur->delete();

        // Alert de succès
        Alert::success('Succès', 'Fournisseur supprimé avec succès.');

        // Redirection
        return redirect()->route('fournisseurs.index');
    }

    /**
     * Filtrer les fournisseurs.
     */
    public function filterProducts(Request $request)
    {
        $query = Fournisseur::query();

        // Appliquer le filtre de recherche
        if ($request->has('search') && !empty($request->search)) {
            $query->where('nom', 'like', '%' . $request->search . '%');
        }

        // Appliquer le filtre de type
        if ($request->has('type') && !empty($request->type)) {
            $query->where('type_id', $request->type);
        }

        // Récupérer les fournisseurs filtrés
        $fournisseurs = $query->get();

        // Retourner les résultats sous forme de JSON
        return response()->json($fournisseurs);
    }
}