<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ventes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produit_id')->constrained('produits')->onDelete('cascade');

            // lot ou unité
            $table->enum('type_vente', ['unite', 'lot'])->default('unite');

            // nombre de lots ou d’unités vendus
            $table->integer('quantite_vendue')->default(0);

            // prix appliqué
            $table->decimal('prix_vente_unitaire', 10, 2)->nullable();

            // total calculé
            $table->decimal('valeur_totale', 10, 2)->nullable();

            $table->date('date_vente')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventes');
    }
};
