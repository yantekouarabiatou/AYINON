<?php

namespace App\MediaLibrary;

use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;

class CustomPathGenerator implements PathGenerator
{
    public function getPath(Media $media): string
    {
        // Tous les fichiers seront stockés dans le dossier "produits"
        return 'produits/';
    }

    public function getPathForConversions(Media $media): string
    {
        // Dossier pour les conversions (si vous utilisez des images redimensionnées)
        return 'produits/conversions/';
    }

    public function getPathForResponsiveImages(Media $media): string
    {
        // Dossier pour les images responsives (si vous utilisez cette fonctionnalité)
        return 'produits/responsive-images/';
    }
}