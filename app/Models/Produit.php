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

    
        public function registerMediaCollections(): void
        {
            $this->addMediaCollection('produits')
                 ->useDisk('public')
                 ->singleFile(); // Si chaque produit n'a qu'une seule image
        }
    
        public function registerMediaConversions(Media $media = null): void
        {
            $this->addMediaConversion('thumb')
                ->width(100)
                ->height(100)
                ->quality(80)
                ->sharpen(10)
                ->optimize()
                ->nonQueued();
    
            $this->addMediaConversion('medium')
                ->width(400)
                ->height(400)
                ->quality(85)
                ->nonQueued();
    
            $this->addMediaConversion('large')
                ->width(800)
                ->height(800)
                ->quality(90)
                ->nonQueued();
        }

    // Relation avec HistoriqueStock
    public function historiqueStocks()
    {
        return $this->hasMany(HistoriqueStock::class);
    }

    // Relation avec Categorie
    public function categories()
    {
        return $this->belongsTo(Categorie::class);
    }

    // Relation avec Vente_detail
    public function vente_details()
    {
        return $this->belongsTo(Vente_detail::class);
    }

    // Relation avec Commande
    public function commandes()
    {
        return $this->belongsToMany(Commande::class, 'produit_commande', 'produit_id', 'commande_id')->withTimestamps();
    }
}
