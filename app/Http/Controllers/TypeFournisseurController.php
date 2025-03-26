<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\TypeFournisseur;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class TypeFournisseurController extends Controller
{
    /**
     * Affiche la liste des catégories.
     */
    public function index()
    {
         $Tfournisseurs = TypeFournisseur::paginate(10);
         $user=User::all();
         return view('typeF.index ', compact('Tfournisseurs','user'));
    }

    /**
     * Affiche le formulaire pour créer une catégorie.
     */
    public function create()
    { 
        $Tfournisseurs = TypeFournisseur::paginate(10);
        $user=User::all();
        return view('typeF.create', compact('Tfournisseurs','user'));
    }

    /**
     * Enregistre une nouvelle catégorie.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            
        ]);

        TypeFournisseur::create($validated);

        return redirect()->route('Tfournisseurs.index')->with('success', 'Catégorie ajoutée avec succès !');
    }

    /**
     * Affiche une catégorie spécifique.
     */
    public function show($id)
{
    $Tfournisseur = TypeFournisseur::findOrFail($id); // Trouve la catégorie par ID
    return view('TypeF.show', compact('Tfournisseur'));
}

    
     public function edit($id)
{
    $Tfournisseur = TypeFournisseur::findOrFail($id);
    return view('TypeF.edit', compact('Tfournisseur')); // Correction ici
}


    

    /**
     * Met à jour une catégorie existante.
     */
    public function update(Request $request, $id)
{
    $Tfournisseur = TypeFournisseur::findOrFail($id);

    // Correction : Utilisation de 'nom' pour la validation
    $validated = $request->validate([
        'nom' => 'required|string|max:255', // 'nom' correspond à ton champ de formulaire
    ]);

    $Tfournisseur->update($validated);

    Alert::success('Succès', 'Type fournisseur mis à jour avec succès.');

    return redirect()->route('Tfournisseurs.index')->with('success', 'Type fournisseur mis à jour avec succès !');
}

    /**
     * Supprime une catégorie.
     */
    public function destroy($id)
{
    $Tfournisseurs = TypeFournisseur::findOrFail($id);
    $Tfournisseurs->delete();
    Alert::success('Succès', 'Type fournisseurs supprimée avec succès.');
    return redirect()->route('Tfournisseurs.index')->with('success', 'Type fournisseurs supprimé avec succès !');
}

}


