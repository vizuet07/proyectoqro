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
        Schema::create('Resultados', function (Blueprint $table) {
            $table->id('ID_Resultado'); // Define el ID con nombre específico y auto-incremental
            $table->string('CodigoQR', 50)->unique(); // Campo NVARCHAR(50) con UNIQUE y NOT NULL
            $table->string('Resultado', 100)->nullable(); // Campo NVARCHAR(100) nullable
            $table->timestamp('Fecha')->default(DB::raw('CURRENT_TIMESTAMP')); // Campo DATETIME con valor por defecto de la fecha actual
        });
        DB::statement('
        CREATE TRIGGER update_resultado_timestamp
        BEFORE UPDATE ON Resultados
        FOR EACH ROW
        BEGIN
            IF (NEW.Fecha IS NOT NULL AND OLD.Fecha IS NULL) OR
            (NEW.Fecha IS NULL AND OLD.Fecha IS NOT NULL) OR
            (NEW.Fecha <> OLD.Fecha) THEN
                SET NEW.Fecha = CURRENT_TIMESTAMP;
            END IF;
        END
    ');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Resultados');
        DB::statement('DROP TRIGGER IF EXISTS update_resultado_timestamp');

    }
};
