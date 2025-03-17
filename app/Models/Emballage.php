<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emballage extends Model
{
    use HasFactory;

    protected $table = 'emballage';

    protected $fillable = [
        'produit_id',
        'prix_achat',
        'prix_unitaire',
        'prix_carton',
    ];

    // Relation avec la table Produit
    public function produit()
    {
        return $this->belongsTo(Produit::class, 'produit_id');
    }
}
