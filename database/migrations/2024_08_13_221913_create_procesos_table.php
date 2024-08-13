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
        Schema::create('Procesos', function (Blueprint $table) {
            $table->id('ID_Proceso'); // Define el ID con nombre específico y auto-incremental
            $table->string('CodigoQR', 50)->unique(); // Campo NVARCHAR(50) con UNIQUE y NOT NULL
            $table->string('Proceso01', 10)->nullable(); // Campo NVARCHAR(10) nullable
            $table->string('Proceso02', 10)->nullable(); // Campo NVARCHAR(10) nullable
            $table->string('Proceso03', 10)->nullable(); // Campo NVARCHAR(10) nullable
            $table->string('Proceso04', 10)->nullable(); // Campo NVARCHAR(10) nullable
            $table->string('Proceso05', 10)->nullable(); // Campo NVARCHAR(10) nullable
            $table->string('Proceso06', 10)->nullable(); // Campo NVARCHAR(10) nullable
            $table->string('Proceso07', 10)->nullable(); // Campo NVARCHAR(10) nullable
            $table->string('Proceso08', 10)->nullable(); // Campo NVARCHAR(10) nullable
            $table->string('Proceso09', 10)->nullable(); // Campo NVARCHAR(10) nullable
            $table->string('Proceso10', 10)->nullable(); // Campo NVARCHAR(10) nullable
            $table->timestamp('Fecha')->default(DB::raw('CURRENT_TIMESTAMP')); // Campo DATETIME con valor por defecto de la fecha actual
        });

        DB::statement('
            CREATE TRIGGER update_proceso_timestamp
            BEFORE UPDATE ON Procesos
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
        Schema::dropIfExists('Procesos');
        DB::statement('DROP TRIGGER IF EXISTS update_proceso_timestamp');
    }
};
