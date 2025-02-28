<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
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
    public function index()
    {
         $categories = Categorie::paginate(10);
         $user=User::all();
         return view('categories.index', compact('categories','user'));
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

        return redirect()->route('categories.index')->with('success', 'Catégorie ajoutée avec succès !');
    }

    /**
     * Affiche une catégorie spécifique.
     */
    public function show($id)
{
    $categorie = Categorie::findOrFail($id); // Trouve la catégorie par ID
    return view('categories.show', compact('categorie'));
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
