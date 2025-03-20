<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vente;
use App\Models\Vente_detail;
use App\Models\Produit;
use App\Models\HistoriqueStock;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;


class VenteController extends Controller
{
    /**
     * Afficher la liste des ventes.
     */
    public function index()
    {
        $ventes = Vente::with('vente_details.produit')
            ->orderBy('created_at', 'desc')
            ->get();

    return view('ventes.index', compact('ventes'));
    }

    /**
     * Afficher le formulaire de création d'une vente.
     */
    public function create()
    {
        // Récupérer tous les produits disponibles
        $produits = Produit::where('quantite', '>', 0)->get();

        // Calculer l'ID de la prochaine vente
        $nextVenteId = Vente::max('id') + 1;

        return view('ventes.create', compact('produits', 'nextVenteId'));
    }

    /**
     * Enregistrer une nouvelle vente.
     */
    public function store(Request $request)
{
    Log::info('Début de la création de la vente');
    Log::info('Données reçues:', $request->all());

    $request->validate([
        'mode_payement' => 'required|in:cash,cheque',
        'produits' => 'required|array',
        'produits.*' => 'exists:produits,id',
        'quantites' => 'required|array',
        'quantites.*' => 'numeric|min:1',
    ]);

    DB::beginTransaction();

    try {
        Log::info('Création d\'une nouvelle vente initiée.');

        // Créer la vente avec un montant total initial de 0
        $vente = Vente::create([
            'user_id' => auth()->id(), // Utilisateur connecté
            'montant_total' => 0, // Calculé plus tard
            'mode_payement' => $request->mode_payement,
        ]);

        $montantTotal = 0;

        // Parcourir les produits sélectionnés
        foreach ($request->produits as $produitId) {
            $produit = Produit::find($produitId);
            $quantite = $request->quantites[$produitId];

            // Vérifier si la quantité est disponible
            $totalQuantiteDisponible = HistoriqueStock::where('produit_id', $produitId)
                                                      ->where('type_mouvement', 'entrée')
                                                      ->where('quantite', '>', 0)
                                                      ->sum('quantite');

            if ($totalQuantiteDisponible < $quantite) {
                throw new \Exception('Stock insuffisant pour le produit ' . $produit->name);
            }

            // Appliquer la logique FIFO
            $quantiteRestante = $quantite;
            $lots = HistoriqueStock::where('produit_id', $produitId)
                                    ->where('type_mouvement', 'entrée')
                                    ->where('quantite', '>', 0)
                                    ->orderBy('date_mouvement')
                                    ->get();

            foreach ($lots as $lot) {
                if ($quantiteRestante <= 0) break;

                if ($lot->quantite >= $quantiteRestante) {
                    $lot->quantite -= $quantiteRestante;
                    $quantiteRestante = 0;
                } else {
                    $quantiteRestante -= $lot->quantite;
                    $lot->quantite = 0;
                }

                $lot->save();
            }

            // Mettre à jour la quantité totale du produit
            $produit->quantite -= $quantite;
            $produit->save();

            // Enregistrer les détails de la vente
            Vente_detail::create([
                'vente_id' => $vente->id,
                'produit_id' => $produitId,
                'quantite' => $quantite,
                'prix_unitaire' => $produit->prix,
                'montant_total' => $quantite * $produit->prix,
            ]);

            // Enregistrer la sortie dans l'historique des stocks
            HistoriqueStock::create([
                'produit_id' => $produitId,
                'type_mouvement' => 'sortie',
                'quantite' => $quantite,
                'date_mouvement' => now(),
                'vente_id' => $vente->id,
            ]);

            // Ajouter au montant total
            $montantTotal += $quantite * $produit->prix;
        }

        // Mettre à jour le montant total de la vente
        $vente->update(['montant_total' => $montantTotal]);

        DB::commit();
        Log::info('Vente créée avec succès.', ['vente_id' => $vente->id, 'montant_vente' => $montantTotal]);

        // Rediriger vers la liste des ventes avec un message de succès
        return redirect()->route('ventes.create')->with([
            'success' => 'Vente enregistrée avec succès.',
            'vente_id' => $vente->id // Passer l'ID de la vente à la vue
        ]);
    } catch (\Exception $e) {
        DB::rollBack();
        Log::error('Erreur lors de la création de la vente: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Erreur lors de l\'enregistrement de la vente: ' . $e->getMessage());
    }
}

    public function genererFacture($venteId)
    {
        Log::info('Génération de la facture initiée pour la vente ID: ' . $venteId);

        // Récupérer les informations de la vente
        $vente = Vente::with('vente_details.produit')->findOrFail($venteId);

        // Récupérer les détails de la vente
        $venteDetails = $vente->vente_details;

        // Récupérer les informations du client (à adapter selon votre modèle de données)
        $client = [
            'nom' => 'Client Nom',
            'email' => 'client@example.com',
            'adresse' => 'Adresse du client'
        ];

        // Récupérer les informations de l'entreprise
        $entreprise = [
            'nom' => 'Nom de l\'Entreprise',
            'adresse' => 'Adresse de l\'Entreprise',
            'logo' => public_path('path/to/logo.png')
        ];

        // Générer la facture en PDF
        $pdf = PDF::loadView('factures.invoice', compact('vente', 'venteDetails', 'client', 'entreprise'));

        // Sauvegarder ou télécharger le PDF
        return $pdf->stream('invoice_' . $venteId . '.pdf');
    }

    



    /**
     * Afficher les détails d'une vente.
     */
    public function show(Vente $vente)
    {
        return view('ventes.show', compact('vente'));
    }

    /**
     * Supprimer une vente.
     */
    public function destroy(Vente $vente)
    {
        DB::beginTransaction();

        try {
            Log::info('Suppression de la vente initiée.', ['vente_id' => $vente->id]);

            // Restaurer les quantités des produits vendus
            foreach ($vente->vente_details as $detail) {
                $produit = Produit::find($detail->produit_id);
                $produit->quantite += $detail->quantite;
                $produit->save();

                // Enregistrer l'annulation dans l'historique des stocks
                HistoriqueStock::create([
                    'produit_id' => $detail->produit_id,
                    'type_mouvement' => 'annulation',
                    'quantite' => $detail->quantite,
                    'date_mouvement' => now(),
                    'vente_id' => $vente->id,
                ]);
            }

            // Supprimer les détails de la vente
            $vente->vente_details()->delete();

            // Supprimer la vente
            $vente->delete();

            DB::commit();
            Log::info('Vente supprimée avec succès.', ['vente_id' => $vente->id]);

            // Générer la facture
            // $this->genererFacture($vente->id);

            return redirect()->route('ventes.index')->with('success', 'Vente supprimée avec succès.');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erreur lors de la suppression de la vente: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Erreur lors de la suppression de la vente: ' . $e->getMessage());
        }
    }

    public function enregistrerEntree(Request $request)
{
    $request->validate([
        'produit_id' => 'required|exists:produits,id',
        'quantite' => 'required|numeric',
        'date_mouvement' => 'required|date',
    ]);

    // Enregistrer l'entrée dans l'historique des stocks
    HistoriqueStock::create([
        'produit_id' => $request->produit_id,
        'type_mouvement' => 'entrée',
        'quantite' => $request->quantite,
        'date_mouvement' => $request->date_mouvement,
    ]);

    // Mettre à jour la quantité totale du produit
    $produit = Produit::find($request->produit_id);
    $produit->quantite += $request->quantite;
    $produit->save();

    return response()->json(['message' => 'Entrée de stock enregistrée avec succès'], 201);
}

public function showFacture($venteId)
{
    Log::info('Affichage de la facture initiée pour la vente ID: ' . $venteId);

    // Récupérer les informations de la vente
    $vente = Vente::with('vente_details.produit')->findOrFail($venteId);

    // Récupérer les détails de la vente
    $venteDetails = $vente->vente_details;

    // Récupérer les informations de l'entreprise
    $entreprise = [
        'nom' => 'Nom de l\'Entreprise',
        'adresse' => 'Adresse de l\'Entreprise',
        'logo' => public_path('path/to/logo.png')
    ];

    // Calculer le montant total avec la TVA
    $montantTotalHT = $vente->montant_total;
    $montantTotalTTC = $montantTotalHT * 1.18;

    // Afficher la vue de la facture
    return view('factures.show', compact('vente', 'venteDetails', 'entreprise', 'montantTotalHT', 'montantTotalTTC'));
}

}
