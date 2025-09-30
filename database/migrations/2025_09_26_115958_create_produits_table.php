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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('reference')->unique()->nullable();
            $table->string('category')->nullable();
            $table->integer('quantity_in_stock')->default(0);
            $table->text('description')->nullable();
            $table->decimal('unit_price', 10, 2)->nullable();
            $table->decimal('seller_price', 10, 2)->nullable();
            // prix de vente par lot (carton)
            $table->decimal('lot_price', 10, 2)->nullable();
            // nombre d’unités par lot (conversion)
            $table->integer('units_per_lot')->default(1);
            $table->integer('alert_seuil')->default(0)->nullable();
            $table->string('image_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
