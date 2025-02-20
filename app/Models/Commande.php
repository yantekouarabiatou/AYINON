<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        'categorie_id',
        'peremption_date',
        'reference',
        'statut',
    ];

    /**
     * Relation avec la produits.
     */
    public function produits()
    {
        return $this->belongsTo(Produit::class);
    }
    public function categories()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function forunisseurs()
    {
        return $this->belongsTo(Fournisseur::class);
    }
}
