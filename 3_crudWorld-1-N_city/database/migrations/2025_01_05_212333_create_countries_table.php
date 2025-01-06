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
        Schema::create('countries', function (Blueprint $table) {
            $table->id(); // ID auto incremental
            $table->string('name'); // Nombre del país
            $table->string('code')->unique(); // Código del país (ej. 'US', 'ES')
            $table->integer('population')->nullable(); // Población del país
            $table->timestamps(); // Fecha de creación y actualización
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
