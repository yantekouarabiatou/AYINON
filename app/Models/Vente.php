<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    public function produit()
    {
        return $this->belongsTo(Produit::class,'produit_id');
    }

    public function vente_details()
    {
        return $this->belongsTo(Vente_detail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
