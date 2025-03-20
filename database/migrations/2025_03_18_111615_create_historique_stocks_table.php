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
        Schema::create('historique_stocks', function (Blueprint $table) {
            $table->id(); // Identifiant unique
            $table->foreignId('produit_id')->constrained()->onDelete('cascade'); // Référence au produit
            $table->enum('type_mouvement', ['entrée', 'sortie', 'retour', 'ajustement']); // Type de mouvement
            $table->integer('quantite'); // Quantité concernée par le mouvement
            $table->date('date_mouvement'); // Date du mouvement
            $table->foreignId('commande_id')->nullable()->constrained()->onDelete('set null'); // Référence à la commande (si applicable)
            $table->foreignId('vente_id')->nullable()->constrained()->onDelete('set null'); // Référence à la vente (si applicable)
            $table->timestamps(); // Created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historique_stocks');
    }
};
