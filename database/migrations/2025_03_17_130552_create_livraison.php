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
        Schema::create('livraison', function (Blueprint $table) {
            $table->id(); // Colonne ID par défaut
            $table->unsignedBigInteger('produit_commande_id'); // Colonne pour la clé étrangère
            $table->date('dateLivraison'); // Colonne pour la date de livraison
            $table->timestamps(); // Colonnes created_at et updated_at

            // Définir la clé étrangère
            $table->foreign('produit_commande_id')
                  ->references('id')
                  ->on('produit_commande')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livraison');
    }
};