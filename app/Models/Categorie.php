<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = ['name','description'];

    /**
     * Relation avec les produits.
     */
    public function produits(): HasMany
    {
        return $this->hasMany(Produit::class);
    }
    public function commandes(): HasMany
    {
        return $this->hasMany(Commande::class);
    }
}
