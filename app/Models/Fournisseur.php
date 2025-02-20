<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    //use HasFactory;

    /**
     * Les attributs pouvant être assignés en masse.
     *
     * @var array
     */
    protected $fillable = [
        'type_id',
        'nom',
        'logo',
        'reseau',
        
    ];

    /**
     * Relation avec la catégorie.
     */
    public function type_fournisseurs()
    {
        return $this->belongsTo(Type_fournisseur::class);
    }


    public function commandes(): HasMany
    {
        return $this->hasMany(Commande::class);
    }
}
