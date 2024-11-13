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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // Nombre del producto
            $table->text('descripcion'); // Descripción del producto
            $table->decimal('precio', 8, 2); // Precio del producto
            $table->integer('stock'); // Cantidad de stock disponible
            $table->string('imagen')->nullable(); // Ruta de la imagen del producto (puede ser null)
            $table->date('fecha_inicio'); // Fecha de inicio de la disponibilidad del producto
            $table->date('fecha_fin'); // Fecha de fin de la disponibilidad del producto
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
