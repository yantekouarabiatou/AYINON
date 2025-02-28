<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class commande extends Model
{
    use HasFactory;

    /**
     * Les attributs pouvant être assignés en masse.
     *
     * @var array
     */
    protected $fillable = [
        'quantite',
        'date_entree',
        'produit_id',
        'fournisseur_id',
        'peremption_date',
        'reference',
        'statut',
    ];

    /**
     * Relation avec la produits.
     */
    public function produit()
    {
        return $this->belongsTo(Produit::class,'produit_id');
    }
    public function categories()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class,'fournisseur_id');
    }
}
