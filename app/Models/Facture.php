<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;

    /**
     * Les attributs pouvant être assignés en masse.
     *
     * @var array
     */
    protected $fillable = [
        'numero',
        'vente_id',
        'montant_total',
        'statut',
        
    ];

    /**
     * Relation avec la catégorie.
     */
    public function ventes()
    {
        return $this->belongsTo(Vente::class);
    }

}
