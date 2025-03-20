<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriqueStock extends Model
{
    use HasFactory;

    /**
     * Les attributs qui sont mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'produit_id',
        'type_mouvement',
        'quantite',
        'date_mouvement',
        'commande_id',
        'vente_id',
    ];

    /**
     * Relation avec le modèle Produit.
     */
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }

    /**
     * Relation avec le modèle Commande.
     */
    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }

    /**
     * Relation avec le modèle Vente.
     */
    public function vente()
    {
        return $this->belongsTo(Vente::class);
    }
}