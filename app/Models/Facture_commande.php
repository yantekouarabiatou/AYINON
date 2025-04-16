<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
class Facture_commande extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    protected $fillable = ['commande_id'];
    
     // Ajoute cette fonction pour enregistrer les collections de médias
     public function registerMediaConversions(Media $media = null): void
     {
         $this->addMediaConversion('recu') // Nom de la conversion
             ->width(100) // Largeur de l'image
             ->height(100) // Hauteur de l'image
             ->nonQueued(); // Exécuter la conversion immédiatement (optionnel)
     }
 
    public function commande()
    {
        return $this->belongsTo(Commande::class, 'commande_id');
    }
}
