<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProduitCommande extends Pivot
{
    protected $table = 'produit_commande';

    protected $fillable = [
        'produit_id',
        'commande_id',
    ];

    // Relationship with Commande (One-to-Many)
    public function commande()
    {
        return $this->belongsTo(Commande::class, 'commande_id');
    }

    // Relationship with Produit (One-to-Many)
    public function produit()
    {
        return $this->belongsTo(Produit::class, 'produit_id');
    }

    public $timestamps = true;
}
