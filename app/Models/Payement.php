<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payement extends Model
{
    use HasFactory;

    /**
     * Les attributs pouvant être assignés en masse.
     *
     * @var array
     */
    protected $fillable = [
        'vente_id',
        'montant_total',
        'date_payement',
        'mode_payement',
        
    ];

    public function ventes()
    {
        return $this->belongsTo(Vente::class);
    }
}
