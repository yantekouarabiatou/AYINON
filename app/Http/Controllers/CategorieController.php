<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\TypeFournisseur;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Container\Attributes\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log as FacadesLog;

class CategorieController extends Controller
{
    /**
     * Affiche la liste des catégories.
     */
    public function index(Request $request)
    {

        $perPage = $request->input('per_page', 2); // Valeur par défaut à 10 si non précisé
        $categories = Categorie::paginate($perPage);       
         $users = User::all();
        return view('categories.index', compact('categories', 'users'));
    }
    

    /**
     * Affiche le formulaire pour créer une catégorie.
     */
    public function create()
    { 
        $categories = Categorie::paginate(10);
        $user=User::all();
        return view('categories.create', compact('categories','user'));
    }

    /**
     * Enregistre une nouvelle catégorie.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Categorie::create($validated);
        Alert::success('Succès', 'Catégorie ajouté avec succès.');
        return redirect()->route('categories.index')->with('success', 'Catégorie ajoutée avec succès !');
    }

    /**
     * Affiche une catégorie spécifique.
     */
    public function show($id)
{
      $categorie = Categorie::findOrFail($id); // Trouve la catégorie par ID
       return view('categories.show', compact('categorie','Tfournisseur'));
}

    

    /**
     * Affiche le formulaire d'édition d'une catégorie.
     */
    public function edit($id)
{
    $categorie = Categorie::findOrFail($id);
    return view('categories.edit', compact('categorie'));
}

    

    /**
     * Met à jour une catégorie existante.
     */
    public function update(Request $request, $id)
    {
        $categorie = Categorie::findOrFail($id);
  
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
  
        $categorie->update($validated);
        Alert::success('Succès', 'Catégorie mis à jour avec succès.');

        return redirect()->route('categories.index')->with('success', 'Catégorie mise à jour avec succès !');
    }
  

    
    /**
     * Supprime une catégorie.
     */
    public function destroy($id)
{
    $categorie = Categorie::findOrFail($id);
    $categorie->delete();
    Alert::success('Succès', 'categorie supprimée avec succès.');
    return redirect()->route('categories.index')->with('success', 'Catégorie supprimée avec succès !');
}

}
