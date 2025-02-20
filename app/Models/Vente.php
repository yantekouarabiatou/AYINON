<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vente extends Model
{
    /**
     * Les attributs pouvant être assignés en masse.
     *
     * @var array
     */
    protected $fillable = [
        'produit_id',
        'montant_total',
        'user_id',  
    ];

    public function payements(): HasMany
    {
        return $this->hasMany(Payement::class);
    }

    public function produits()
    {
        return $this->belongsTo(Produit::class);
    }

    public function vente_details()
    {
        return $this->belongsTo(Vente_detail::class);
    }

    public function users()
    {
        return $this->belongsTo(Users::class);
    }
}
