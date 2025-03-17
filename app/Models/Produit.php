<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Produit extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;


    protected $fillable = [
        'name',
        'description',
        'categorie_id',
        'prix',
        'stock_alert',
        'quantite',
    ];

    // Ajoute cette fonction pour enregistrer les collections de médias
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('photo') // Nom de la conversion
            ->width(100) // Largeur de l'image
            ->height(100) // Hauteur de l'image
            ->nonQueued(); // Exécuter la conversion immédiatement (optionnel)
    }


    public function categories()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function vente_details()
    {
        return $this->belongsTo(Vente_detail::class);
    }

    public function commandes()
      {
         return $this->belongsToMany(Commande::class, 'produit_commande', 'produit_id', 'commande_id')->withTimestamps();
     }

}
