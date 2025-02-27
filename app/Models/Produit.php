<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Produit extends Model
{
    use HasFactory;

    /**
     * Les attributs pouvant être assignés en masse.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'photo',
        'description',
        'categorie_id',
        'prix',
        'quantite',
    ];

    /**
     * Relation avec la catégorie.
     */
    public function categories()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function vente_details()
    {
        return $this->belongsTo(Vente_detail::class);
    }

    public function commandes(): HasMany
    {
        return $this->hasMany(commande::class);
    }
}
