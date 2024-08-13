<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Piezas', function (Blueprint $table) {
            $table->id('ID_Pieza'); // Define el ID con nombre específico
            $table->string('CodigoQR', 50)->unique(); // Campo NVARCHAR(50) con UNIQUE y NOT NULL
            $table->string('Modelo', 50)->nullable(); // Campo NVARCHAR(50) nullable
            $table->string('Kanban', 50)->nullable(); // Campo NVARCHAR(50) nullable
            $table->string('Estatus', 50)->nullable(); // Campo NVARCHAR(50) nullable
            $table->timestamp('FechaCreacion')->default(DB::raw('CURRENT_TIMESTAMP')); // Campo DATETIME con valor por defecto
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Piezas');
    }
};
