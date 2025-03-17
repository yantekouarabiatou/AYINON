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

        // Add the media URL to each product
        $produits->each(function ($produit) {
            $produit->photo = $produit->getFirstMediaUrl('produits');
        });

        // Filter products with quantity less than or equal to stock alert
        $alertProduits = $produits->filter(function ($produit) {
            return $produit->quantite <= $produit->stock_alert;
        });

        // Pass the products and alert products to the view
        return view('produits.index', compact('produits', 'alertProduits'));
    }

    public function create()
    {
        $categories = Categorie::all();
        return view('produits.create', compact('categories'));
    }

    public function layout()
    {
        $produits = Produit::with('categories')->get();

        $produits->each(function ($produit) {
            $produit->photo = $produit->getFirstMediaUrl('produits');
        });

        $alertProduits = $produits->filter(function ($produit) {
            return $produit->quantite <= $produit->stock_alert;
        });

        $categories = Categorie::all();

        return view('layout', compact('categories', 'produits', 'alertProduits'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'categorie_id' => 'required',
            'prix' => 'required|numeric',
            'quantite' => 'required|numeric',
            'stock_alert' => 'required|numeric',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $produit = Produit::create($request->except('photo'));

        if ($request->hasFile('photo')) {
            $produit->addMediaFromRequest('photo')
                ->usingFileName($produit->id . '-' . $request->file('photo')->getClientOriginalName())
                ->toMediaCollection('produits', 'public');
        }

        Alert::success('Succès', 'Produit ajouté avec succès.');
        return redirect()->route('produits.index')->with('success', 'Produit ajouté avec succès.');
    }

    public function show(Produit $produit)
    {
        return view('produits.show', compact('produit'));
    }

    public function edit(Produit $produit)
    {
        $categories = Categorie::all();
        return view('produits.update', compact('produit', 'categories'));
    }

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

        $produit->update($request->except('photo'));

        if ($request->hasFile('photo')) {
            Log::info('Photo file received:', [
                'file_name' => $request->file('photo')->getClientOriginalName(),
                'file_size' => $request->file('photo')->getSize(),
            ]);

            $produit->clearMediaCollection('produits');

            $produit->addMedia($request->file('photo'))
                ->usingFileName($produit->id . '-' . $request->file('photo')->getClientOriginalName())
                ->toMediaCollection('produits', 'public');

            Log::info('Media details for product', [
                'produit_id' => $produit->id,
                'media_url' => $produit->getFirstMediaUrl('produits'),
                'file_exists' => file_exists(storage_path('app/public/' . $produit->getFirstMedia('produits')?->id . '/' . $produit->getFirstMedia('produits')?->file_name))
            ]);
        }

        Log::info('Produit updated successfully:', ['produit_id' => $produit->id]);

        Alert::success('Succès', 'Produit mis à jour avec succès.');
        return redirect()->route('produits.index')->with('success', 'Produit mis à jour avec succès.');
    }

    public function destroy(Produit $produit)
    {
        $produit->clearMediaCollection('produits');
        $produit->delete();

        Alert::success('Succès', 'Produit supprimé avec succès.');
        return redirect()->route('produits.index');
    }

    public function filterproduits(Request $request)
    {
        $query = Produit::query();

        if ($request->has('search') && !empty($request->search)) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->has('category') && !empty($request->category)) {
            $query->where('categorie_id', $request->category);
        }

        $produits = $query->get();

        return response()->json($produits);
    }
}
