<?php

// app/Http/Controllers/VenteDetailController.php

namespace App\Http\Controllers;

use App\Models\VenteDetail;
use App\Models\Vente;
use App\Models\Produit;
use App\Models\Vente_detail;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class VenteDetailController extends Controller
{
    /**
     * Affiche la liste des détails de vente.
     */
    public function index($vente_id)
    {
        $detailsVentes = Vente_detail::where('vente_id', $vente_id)
        ->with(['vente', 'produit'])
        ->get();
        return view('detailsVentes.index', compact('detailsVentes'));
    }

    /**
     * Affiche le formulaire pour créer un nouveau détail de vente.
     */
    public function create()
    {
        $ventes = Vente::all();
        $produits = Produit::all();
        return view('detailsVentes.create', compact('ventes', 'produits'));
    }

    /**
     * Enregistre un nouveau détail de vente.
     */
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'produit_id' => 'required|array',
            'produit_id.*' => 'exists:produits,id',
            'quantite' => 'required|array',
            'quantite.*' => 'numeric|min:1',
        ]);
    
        // Créer une nouvelle vente
        $vente = Vente::create([
            'user_id' => auth()->id(),
            'montant_total' => 0, // Le montant total sera calculé plus tard
        ]);
    
        // Initialiser le montant total de la vente
        $montantTotal = 0;
    
        // Ajouter les détails de vente
        foreach ($request->produit_id as $index => $produitId) {
            $produit = Produit::find($produitId);
            $quantite = $request->quantite[$index];
            $montantTotalProduit = $produit->prix * $quantite;
    
            $vente->vente_details()->create([
                'produit_id' => $produitId,
                'quantite' => $quantite,
                'prix_unitaire' => $produit->prix,
                'montant_total' => $montantTotalProduit,
            ]);
    
            // Ajouter au montant total de la vente
            $montantTotal += $montantTotalProduit;
        }
    
        // Mettre à jour le montant total de la vente
        $vente->update([
            'montant_total' => $montantTotal,
        ]);
        Alert::success('Succès', 'Détail de vente ajouté avec succès.');
    
        return redirect()->route('detailsVentes.index', ['vente_id' => $vente->id]);
    }
    
    /**
     * Affiche un détail de vente spécifique.
     */
    public function show(Vente_detail $detailsVente)
    {
        $detailsVente->load('vente', 'produit');
        return view('detailsVentes.show', compact('detailsVente'));
    }

    /**
     * Affiche le formulaire de modification d’un détail de vente.
     */
    public function edit(Vente_detail $detailsVente)
    {
        $ventes = Vente::all();
        $produits = Produit::all();
        return view('detailsVentes.edit', compact('detailsVente', 'ventes', 'produits'));
    }

    /**
     * Met à jour un détail de vente.
     */
    public function update(Request $request, Vente_detail $detailsVente)
    {
        $request->validate([
            'vente_id' => 'required|exists:ventes,id',
            'produit_id' => 'required|exists:produits,id',
            'quantite' => 'required|integer|min:1',
            'prix_unitaire' => 'required|numeric|min:0',
        ]);

        // Mise à jour du détail de vente
        $detailsVente->update([
            'vente_id' => $request->vente_id,
            'produit_id' => $request->produit_id,
            'quantite' => $request->quantite,
            'prix_unitaire' => $request->prix_unitaire,
            'montant_total' => $request->quantite * $request->prix_unitaire, // Recalcul du montant total
        ]);

        Alert::success('Succès', 'Détail de vente mis à jour avec succès.');

        return redirect()->route('detailsVentes.index', ['vente_id' => $vente->id]);
    }

    /**
     * Supprime un détail de vente.
     */
    public function destroy(Vente_detail $detailsVente)
    {
        $detailsVente->delete();
        Alert::success('Succès', 'Détail de vente supprimé avec succès.');

        return redirect()->route('detailsVentes.index');
    }

    public function detailsParVente($vente_id)
        {
            $vente = Vente::with('vente_details.produit')->findOrFail($vente_id);

            return view('detailsVentes.show', compact('vente'));
        }

}
