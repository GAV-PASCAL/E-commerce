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
        // Créer la table commandes
        if (!Schema::hasTable('commandes')) {
            Schema::create('commandes', function (Blueprint $table) {
                $table->id();
                $table->string('numero_fiche', 30)->unique(); // Increased length for CMD-YYYY-XXXX
                $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
                $table->foreignId('vendeur_id')->constrained('users')->onDelete('cascade');
                $table->date('date_commande');
                $table->decimal('montant_total', 10, 2)->nullable()->default(0);
                $table->enum('statut', ['en_attente', 'validee', 'annulee'])->default('en_attente');
                $table->string('reference_paiement')->nullable();
                $table->timestamps();
            });
        }

        // Créer la table pivot commande_produit
        if (!Schema::hasTable('commande_produit')) {
            Schema::create('commande_produit', function (Blueprint $table) {
                $table->id();
                $table->foreignId('commande_id')->constrained('commandes')->onDelete('cascade');
                $table->foreignId('produit_id')->constrained('produits')->onDelete('cascade');
                $table->integer('quantite');
                $table->decimal('prix_unitaire', 10, 2);
                $table->decimal('prix_total', 10, 2);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commande_produit');
        Schema::dropIfExists('commandes');
    }

};
