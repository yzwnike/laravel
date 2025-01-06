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
        Schema::create('cities', function (Blueprint $table) {
            $table->id(); // ID auto incremental
            $table->string('name'); // Nombre de la ciudad
            $table->foreignId('country_id')->constrained()->onDelete('cascade'); // Referencia a la tabla countries
            $table->integer('population')->nullable(); // Población de la ciudad (opcional)
            $table->timestamps(); // Fecha de creación y actualización
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};

