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
        Schema::create('piezas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('serial_number')->unique();
            $table->string('lot');
            $table->tinyInteger('part_status');
            $table->tinyInteger('tsbraket');
            $table->tinyInteger('primer');
            $table->tinyInteger('uretano');
            $table->tinyInteger('primer_glass');
            $table->tinyInteger('qr_out_tsbrake');
            $table->Integer('electrical_test');
            $table->tinyInteger('qr_defogger');
            $table->tinyInteger('wipper');
            $table->tinyInteger('qr_wipper');
            $table->tinyInteger('qr_epoxi_prcss');
            $table->string('kanban');
            $table->tinyInteger('qr_mounting_primer_prcss');
            $table->tinyInteger('qr_pin_assembly');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('piezas');
    }
};
