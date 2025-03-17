<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    use HasFactory;

    protected $table = 'livraison';

    protected $fillable = [
        'produit_commande_id',
        'dateLivraison',
    ];

    // Relation avec la table ProduitCommande
    public function produitCommande()
    {
        return $this->belongsTo(ProduitCommande::class, 'produit_commande_id');
    }
}
