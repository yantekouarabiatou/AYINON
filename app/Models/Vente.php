<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vente extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','montant_total' // L'utilisateur qui effectue la vente
    ];

    public function payements(): HasMany
    {
        return $this->hasMany(Payement::class);
    }

    public function vente_details(): HasMany
    {
        return $this->hasMany(Vente_detail::class); // Relation avec les détails de vente
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class); // Relation avec l'utilisateur
    }
}