<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCommandeIdToFactureCommandesTable extends Migration
{
    public function up()
    {
        Schema::table('facture_commandes', function (Blueprint $table) {
            // Ajouter la colonne commande_id avec une clé étrangère
            $table->unsignedBigInteger('commande_id')->nullable();

            // Ajouter une contrainte de clé étrangère (assurez-vous que la table 'commandes' existe)
            $table->foreign('commande_id')->references('id')->on('commandes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('facture_commandes', function (Blueprint $table) {
            // Supprimer la colonne commande_id et la contrainte de clé étrangère
            $table->dropForeign(['commande_id']);
            $table->dropColumn('commande_id');
        });
    }
}
