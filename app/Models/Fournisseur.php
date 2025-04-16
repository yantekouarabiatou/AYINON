<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;

class Fournisseur extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    /**
     * Les attributs pouvant être assignés en masse.
     *
     * @var array
     */
    protected $fillable = [
        'type_id',
        'nom',
        'reseau',
        
    ];

    // Ajoute cette fonction pour enregistrer les collections de médias
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('logo') // Nom de la conversion
            ->width(100) // Largeur de l'image
            ->height(100) // Hauteur de l'image
            ->nonQueued(); // Exécuter la conversion immédiatement (optionnel)
    }

    /**
     * Relation avec la catégorie.
     */
    public function TypeFournisseur()
    {
        return $this->belongsTo(TypeFournisseur::class);
    }


    public function commandes(): HasMany
    {
        return $this->hasMany(Commande::class);
    }
}
