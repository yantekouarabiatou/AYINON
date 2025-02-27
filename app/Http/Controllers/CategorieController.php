<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\User;
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
        return view('categories.create', compact('categories','user'));
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

    public function success()
    {
        $user=User::all();
        $categories=Categorie::all();
        return view('categories.success', compact('categories','user'));
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

        return redirect()->route('categories.success')->with('success', 'Catégorie ajoutée avec succès !');
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
    {   $categories = Categorie::all();
        $categorie = Categorie::findOrFail($id); // Récupère la catégorie ou échoue
        return view('categories.create', compact('categorie','categories'));
    }
    

    /**
     * Met à jour une catégorie existante.
     */
    public function update(Request $request, Categorie $categorie)
{
    FacadesLog::info('Update method called for category: ' . $categorie->id); // Log pour confirmer que la méthode est appelée

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);

    $categorie->update($validated);

    return redirect()->route('categories.create')->with('success', 'Catégorie mise à jour avec succès !');
}

    
    /**
     * Supprime une catégorie.
     */
    public function destroy(Categorie $categorie)
    {
        $categorie->delete();
        return redirect()->route('categories.create')->with('success', 'Catégorie supprimée avec succès !');
    }
}
