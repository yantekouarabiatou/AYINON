<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vente;
use App\Models\Vente_detail;
use App\Models\Payement;
use App\Models\Facture;
use App\Models\Produit;
use App\Models\HistoriqueStock;
use Illuminate\Support\Facades\DB;

class VenteController extends Controller
{
    /**
     * Afficher la liste des ventes.
     */
    public function index()
    {
        $ventes = Vente::with('vente_details', 'payements', 'facture')->get();
        return response()->json($ventes);
    }

    /**
     * Enregistrer une nouvelle vente.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'montant_total' => 'required|numeric',
            'details' => 'required|array',
            'details.*.produit_id' => 'required|exists:produits,id',
            'details.*.quantite' => 'required|numeric',
            'details.*.prix_unitaire' => 'required|numeric',
        ]);

        DB::beginTransaction();

        try {
            $vente = Vente::create([
                'user_id' => $request->user_id,
                'montant_total' => $request->montant_total,
            ]);

            foreach ($request->details as $detail) {
                $this->processVenteDetail($detail, $vente->id);
            }

            DB::commit();

            $this->generateFacture($vente->id);

            return response()->json(['message' => 'Vente créée avec succès', 'vente_id' => $vente->id], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Erreur lors de la création de la vente', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Afficher les détails d'une vente.
     */
    public function show(Vente $vente)
    {
        return response()->json($vente->load('vente_details', 'payements', 'facture'));
    }

    /**
     * Mettre à jour une vente.
     */
    public function update(Request $request, Vente $vente)
    {
        $request->validate([
            'montant_total' => 'sometimes|required|numeric',
            'details' => 'sometimes|required|array',
            'details.*.produit_id' => 'sometimes|required|exists:produits,id',
            'details.*.quantite' => 'sometimes|required|numeric',
            'details.*.prix_unitaire' => 'sometimes|required|numeric',
        ]);

        DB::beginTransaction();

        try {
            $vente->update($request->only('montant_total'));

            if (isset($request->details)) {
                // Supprimer les anciens détails de vente
                Vente_detail::where('vente_id', $vente->id)->delete();

                // Ajouter les nouveaux détails de vente
                foreach ($request->details as $detail) {
                    $this->processVenteDetail($detail, $vente->id);
                }
            }

            DB::commit();

            return response()->json(['message' => 'Vente mise à jour avec succès', 'vente_id' => $vente->id], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Erreur lors de la mise à jour de la vente', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Supprimer une vente.
     */
    public function destroy(Vente $vente)
    {
        DB::beginTransaction();

        try {
            // Supprimer les détails de vente associés
            Vente_detail::where('vente_id', $vente->id)->delete();

            // Supprimer les paiements associés
            Payement::where('vente_id', $vente->id)->delete();

            // Supprimer la facture associée
            $facture = Facture::where('vente_id', $vente->id)->first();
            if ($facture) {
                $facture->delete();
            }

            // Supprimer la vente
            $vente->delete();

            DB::commit();

            return response()->json(['message' => 'Vente supprimée avec succès'], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Erreur lors de la suppression de la vente', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Traiter les détails de la vente et mettre à jour le stock.
     */
    private function processVenteDetail($detail, $venteId)
    {
        $produit = Produit::find($detail['produit_id']);

        if ($produit->quantite < $detail['quantite']) {
            throw new \Exception('Stock insuffisant pour le produit ' . $produit->name);
        }

        // Mettre à jour le stock du produit
        $produit->quantite -= $detail['quantite'];
        $produit->save();

        // Enregistrer la sortie dans l'historique des stocks
        HistoriqueStock::create([
            'produit_id' => $detail['produit_id'],
            'type_mouvement' => 'sortie',
            'quantite' => $detail['quantite'],
            'date_mouvement' => now(),
            'vente_id' => $venteId,
        ]);

        // Enregistrer les détails de la vente
        Vente_detail::create([
            'vente_id' => $venteId,
            'produit_id' => $detail['produit_id'],
            'quantite' => $detail['quantite'],
            'prix_unitaire' => $detail['prix_unitaire'],
            'montant_total' => $detail['quantite'] * $detail['prix_unitaire'],
        ]);
    }

    /**
     * Générer une facture pour la vente.
     */
    private function generateFacture($venteId)
    {
        $numero = 'F' . str_pad($venteId, 6, '0', STR_PAD_LEFT);

        Facture::create([
            'numero' => $numero,
            'vente_id' => $venteId,
            'montant_total' => Vente::find($venteId)->montant_total,
            'statut' => 'générée',
        ]);
    }

    /**
     * Finaliser le paiement d'une vente.
     */
    public function finalizePayment(Request $request)
    {
        $request->validate([
            'vente_id' => 'required|exists:ventes,id',
            'montant_total' => 'required|numeric',
            'date_payement' => 'required|date',
            'mode_payement' => 'required|string',
        ]);

        Payement::create([
            'vente_id' => $request->vente_id,
            'montant_total' => $request->montant_total,
            'date_payement' => $request->date_payement,
            'mode_payement' => $request->mode_payement,
        ]);

        $facture = Facture::where('vente_id', $request->vente_id)->first();
        $facture->statut = 'payée';
        $facture->save();

        return response()->json(['message' => 'Paiement finalisé avec succès'], 200);
    }
}