<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('emballage', function (Blueprint $table) {
            $table->id(); // Colonne ID par défaut
            $table->unsignedBigInteger('produit_id'); // Colonne pour la clé étrangère
            $table->integer('prix_achat'); // Colonne pour le prix d'achat
            $table->integer('prix_unitaire'); // Colonne pour le prix unitaire
            $table->integer('prix_carton'); // Colonne pour le prix par carton
            $table->timestamps(); // Colonnes created_at et updated_at

            // Définir la clé étrangère
            $table->foreign('produit_id')
                  ->references('id')
                  ->on('produits')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emballage');
    }
};