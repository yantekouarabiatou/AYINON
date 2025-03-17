<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\View;

class ProduitController extends Controller
{
    /**
     * Display a listing of the produits.
     */

     public function __construct()
    {
        // Partager les produits en alerte avec toutes les vues
        View::share('alertProduits', $this->getProduitsEnAlerte());
    }

    private function getProduitsEnAlerte()
    {
        return Produit::whereColumn('quantite', '<=', 'stock_alert')->get();
    }
    public function index()
      {
       // Fetch all products with their categories
       $produits = Produit::with('categories')->get();

       // Transform the products collection to include media URLs
        $produits = $produits->map(function ($produit) {
        $mediaUrl = $produit->getFirstMediaUrl('produits'); // Use 'produits' collection name

        // Return transformed product data
        return [
            'id' => $produit->id,
            'name' => $produit->name,
            'prix' => $produit->prix,
            'description' => $produit->description,
            'quantite' => $produit->quantite,
            'stock_alert' => $produit->stock_alert,
            'photo' => $mediaUrl // Ensure this is the correct URL
        ];
    });

         // Filter products with quantity less than or equal to stock alert
        $alertProduits = $produits->filter(function ($produit) {
        return $produit['quantite'] <= $produit['stock_alert'];
    });

    // Pass the products and alert products to the view
    return view('produits.index', compact('produits', 'alertProduits'));
}

    /**
     * Show the form for creating a new produit.
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('produits.create', compact('categories'));
    }

    public function layout()
    {
        // Récupérer tous les produits avec leurs catégories
        $produits = Produit::with('categories')->get();
    
        // Transformer les produits pour inclure les URLs des médias
        $produits = $produits->map(function ($produit) {
            $mediaUrl = $produit->getFirstMediaUrl('produits'); // Utiliser la collection 'produits'
    
            return [
                'id' => $produit->id,
                'name' => $produit->name,
                'prix' => $produit->prix,
                'description' => $produit->description,
                'quantite' => $produit->quantite,
                'stock_alert' => $produit->stock_alert,
                'photo' => $mediaUrl // URL de l'image
            ];
        });
    
        // Filtrer les produits en alerte
        $alertProduits = $produits->filter(function ($produit) {
            return $produit['quantite'] <= $produit['stock_alert'];
        });
    
        // Récupérer toutes les catégories
        $categories = Categorie::all();
        // Passer les variables à la vue
        return view('layout', compact('categories', 'produits', 'alertProduits'));
    }

    /**
     * Store a newly created produit in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'categorie_id' => 'required',
            'prix' => 'required|numeric',
            'quantite' => 'required|numeric',
            'stock_alert'=>'required|numeric',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        // Create the produit
        $produit = Produit::create($request->except('photo'));

        // Add the image if it exists
        if ($request->hasFile('photo')) {
            $produit->addMediaFromRequest('photo')
                ->usingFileName($produit->id . '-' . $request->file('photo')->getClientOriginalName()) // Unique name based on produit ID
                ->toMediaCollection('produits', 'public');
        }

        Alert::success('Succès', 'Produit ajouté avec succès.');
        return redirect()->route('produits.index')->with('success', 'Produit ajouté avec succès.');
    }

    /**
     * Display the specified produit.
     */
    public function show(Produit $produit)
    {
        return view('produits.show', compact('produit'));
    }

    /**
     * Show the form for editing the specified produit.
     */
    public function edit(Produit $produit)
    {
        $categories = Categorie::all();
        return view('produits.update', compact('produit', 'categories'));
    }

    /**
     * Update the specified produit in storage.
     */
    public function update(Request $request, Produit $produit)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'categorie_id' => 'required|exists:categories,id',
            'prix' => 'required|numeric',
            'quantite' => 'required|integer',
            'stock_alert' => 'required|integer',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Update the produit
        $produit->update($request->except('photo'));
    
        // Add or update the image if it exists
        if ($request->hasFile('photo')) {
            // Log the photo file details for debugging
            Log::info('Photo file received:', [
                'file_name' => $request->file('photo')->getClientOriginalName(),
                'file_size' => $request->file('photo')->getSize(),
            ]);
    
            // Delete the old image if it exists
            $produit->clearMediaCollection('produits');
    
            // Add the new image
            $produit->addMedia($request->file('photo'))
                ->usingFileName($produit->id . '-' . $request->file('photo')->getClientOriginalName()) // Unique name based on produit ID
                ->toMediaCollection('produits', 'public');
    
            // Log the media details for debugging
            Log::info('Media details for product', [
                'produit_id' => $produit->id,
                'media_url' => $produit->getFirstMediaUrl('produits'),
                'file_exists' => file_exists(storage_path('app/public/' . $produit->getFirstMedia('produits')?->id . '/' . $produit->getFirstMedia('produits')?->file_name))
            ]);
        }
    
        // Log success message
        Log::info('Produit updated successfully:', ['produit_id' => $produit->id]);
    
        // Show success alert and redirect
        Alert::success('Succès', 'Produit mis à jour avec succès.');
        return redirect()->route('produits.index')->with('success', 'Produit mis à jour avec succès.');
    }

    /**
     * Remove the specified produit from storage.
     */
    public function destroy(Produit $produit)
    {
        // Delete the associated image
        $produit->clearMediaCollection('produits');

        // Delete the produit
        $produit->delete();

        Alert::success('Succès', 'Produit supprimé avec succès.');
        return redirect()->route('produits.index');
    }

    /**
     * Filter produits based on search and category.
     */
    public function filterproduits(Request $request)
    {
        $query = Produit::query();

        // Apply search filter
        if ($request->has('search') && !empty($request->search)) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Apply category filter
        if ($request->has('category') && !empty($request->category)) {
            $query->where('categorie_id', $request->category);
        }

        // Get the filtered produits
        $produits = $query->get();

        // Return the data as JSON
        return response()->json($produits);
    }
}