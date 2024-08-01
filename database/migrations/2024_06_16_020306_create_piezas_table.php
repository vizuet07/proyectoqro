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
        Schema::create('piezas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('serial_number')->unique();
            $table->string('lot')->nullable();
            $table->tinyInteger('part_status')->nullable();
            $table->tinyInteger('tsbraket')->nullable();
            $table->tinyInteger('primer')->nullable();
            $table->tinyInteger('uretano')->nullable();
            $table->tinyInteger('primer_glass')->nullable();
            $table->tinyInteger('qr_out_tsbrake')->nullable();
            $table->Integer('electrical_test')->nullable();
            $table->tinyInteger('qr_defogger')->nullable();
            $table->tinyInteger('wipper')->nullable();
            $table->tinyInteger('qr_wipper')->nullable();
            $table->tinyInteger('qr_epoxi_prcss')->nullable();
            $table->string('kanban')->nullable();
            $table->tinyInteger('qr_mounting_primer_prcss')->nullable();
            $table->tinyInteger('qr_pin_assembly')->nullable();


            $table->timestamp('updated_serial_number')->nullable();
            $table->timestamp('updated_lot')->nullable();
            $table->timestamp('updated_part_status')->nullable();
            $table->timestamp('updated_tsbraket')->nullable();
            $table->timestamp('updated_primer')->nullable();
            $table->timestamp('updated_uretano')->nullable();
            $table->timestamp('updated_primer_glass')->nullable();
            $table->timestamp('updated_qr_out_tsbrake')->nullable();
            $table->timestamp('updated_electrical_test')->nullable();
            $table->timestamp('updated_qr_defogger')->nullable();
            $table->timestamp('updated_wipper')->nullable();
            $table->timestamp('updated_qr_wipper')->nullable();
            $table->timestamp('updated_qr_epoxi_prcss')->nullable();
            $table->timestamp('updated_kanban')->nullable();
            $table->timestamp('updated_qr_mounting_primer_prcss')->nullable();
            $table->timestamp('updated_qr_pin_assembly')->nullable();
        });

                // Trigger para actualizar updated_part_status
                DB::statement('
                    CREATE TRIGGER update_part_status_timestamp
                    BEFORE UPDATE ON piezas
                    FOR EACH ROW
                    BEGIN
                        IF (NEW.part_status IS NOT NULL AND OLD.part_status IS NULL) OR
                        (NEW.part_status IS NULL AND OLD.part_status IS NOT NULL) OR
                        (NEW.part_status <> OLD.part_status) THEN
                            SET NEW.updated_part_status = CURRENT_TIMESTAMP;
                        END IF;
                    END
                ');
                // Trigger para actualizar updated_lot
                DB::statement('
                CREATE TRIGGER update_lot_timestamp
                BEFORE UPDATE ON piezas
                FOR EACH ROW
                BEGIN
                    IF (NEW.lot IS NOT NULL AND OLD.lot IS NULL) OR
                    (NEW.lot IS NULL AND OLD.lot IS NOT NULL) OR
                    (NEW.lot <> OLD.lot) THEN
                        SET NEW.updated_lot = CURRENT_TIMESTAMP;
                    END IF;
                END
            ');
            // Trigger para actualizar updated_tsbraket
            DB::statement('
                CREATE TRIGGER update_tsbraket_timestamp
                BEFORE UPDATE ON piezas
                FOR EACH ROW
                BEGIN
                    IF (NEW.tsbraket IS NOT NULL AND OLD.tsbraket IS NULL) OR
                    (NEW.tsbraket IS NULL AND OLD.tsbraket IS NOT NULL) OR
                    (NEW.tsbraket <> OLD.tsbraket) THEN
                        SET NEW.updated_tsbraket = CURRENT_TIMESTAMP;
                    END IF;
                END
            ');

            // Trigger para actualizar updated_primer
            DB::statement('
                CREATE TRIGGER update_primer_timestamp
                BEFORE UPDATE ON piezas
                FOR EACH ROW
                BEGIN
                    IF (NEW.primer IS NOT NULL AND OLD.primer IS NULL) OR
                    (NEW.primer IS NULL AND OLD.primer IS NOT NULL) OR
                    (NEW.primer <> OLD.primer) THEN
                        SET NEW.updated_primer = CURRENT_TIMESTAMP;
                    END IF;
                END
            ');

            // Trigger para actualizar updated_uretano
            DB::statement('
                CREATE TRIGGER update_uretano_timestamp
                BEFORE UPDATE ON piezas
                FOR EACH ROW
                BEGIN
                    IF (NEW.uretano IS NOT NULL AND OLD.uretano IS NULL) OR
                    (NEW.uretano IS NULL AND OLD.uretano IS NOT NULL) OR
                    (NEW.uretano <> OLD.uretano) THEN
                        SET NEW.updated_uretano = CURRENT_TIMESTAMP;
                    END IF;
                END
            ');

            // Trigger para actualizar updated_primer_glass
            DB::statement('
                CREATE TRIGGER update_primer_glass_timestamp
                BEFORE UPDATE ON piezas
                FOR EACH ROW
                BEGIN
                    IF (NEW.primer_glass IS NOT NULL AND OLD.primer_glass IS NULL) OR
                    (NEW.primer_glass IS NULL AND OLD.primer_glass IS NOT NULL) OR
                    (NEW.primer_glass <> OLD.primer_glass) THEN
                        SET NEW.updated_primer_glass = CURRENT_TIMESTAMP;
                    END IF;
                END
            ');

            // Trigger para actualizar updated_qr_out_tsbrake
            DB::statement('
                CREATE TRIGGER update_qr_out_tsbrake_timestamp
                BEFORE UPDATE ON piezas
                FOR EACH ROW
                BEGIN
                    IF (NEW.qr_out_tsbrake IS NOT NULL AND OLD.qr_out_tsbrake IS NULL) OR
                    (NEW.qr_out_tsbrake IS NULL AND OLD.qr_out_tsbrake IS NOT NULL) OR
                    (NEW.qr_out_tsbrake <> OLD.qr_out_tsbrake) THEN
                        SET NEW.updated_qr_out_tsbrake = CURRENT_TIMESTAMP;
                    END IF;
                END
            ');

            // Trigger para actualizar updated_electrical_test
            DB::statement('
                CREATE TRIGGER update_electrical_test_timestamp
                BEFORE UPDATE ON piezas
                FOR EACH ROW
                BEGIN
                    IF (NEW.electrical_test IS NOT NULL AND OLD.electrical_test IS NULL) OR
                    (NEW.electrical_test IS NULL AND OLD.electrical_test IS NOT NULL) OR
                    (NEW.electrical_test <> OLD.electrical_test) THEN
                        SET NEW.updated_electrical_test = CURRENT_TIMESTAMP;
                    END IF;
                END
            ');

            // Trigger para actualizar updated_qr_defogger
            DB::statement('
                CREATE TRIGGER update_qr_defogger_timestamp
                BEFORE UPDATE ON piezas
                FOR EACH ROW
                BEGIN
                    IF (NEW.qr_defogger IS NOT NULL AND OLD.qr_defogger IS NULL) OR
                    (NEW.qr_defogger IS NULL AND OLD.qr_defogger IS NOT NULL) OR
                    (NEW.qr_defogger <> OLD.qr_defogger) THEN
                        SET NEW.updated_qr_defogger = CURRENT_TIMESTAMP;
                    END IF;
                END
            ');

            // Trigger para actualizar updated_wipper
            DB::statement('
                CREATE TRIGGER update_wipper_timestamp
                BEFORE UPDATE ON piezas
                FOR EACH ROW
                BEGIN
                    IF (NEW.wipper IS NOT NULL AND OLD.wipper IS NULL) OR
                    (NEW.wipper IS NULL AND OLD.wipper IS NOT NULL) OR
                    (NEW.wipper <> OLD.wipper) THEN
                        SET NEW.updated_wipper = CURRENT_TIMESTAMP;
                    END IF;
                END
            ');

            // Trigger para actualizar updated_qr_wipper
            DB::statement('
                CREATE TRIGGER update_qr_wipper_timestamp
                BEFORE UPDATE ON piezas
                FOR EACH ROW
                BEGIN
                    IF (NEW.qr_wipper IS NOT NULL AND OLD.qr_wipper IS NULL) OR
                    (NEW.qr_wipper IS NULL AND OLD.qr_wipper IS NOT NULL) OR
                    (NEW.qr_wipper <> OLD.qr_wipper) THEN
                        SET NEW.updated_qr_wipper = CURRENT_TIMESTAMP;
                    END IF;
                END
            ');

            // Trigger para actualizar updated_qr_epoxi_prcss
            DB::statement('
                CREATE TRIGGER update_qr_epoxi_prcss_timestamp
                BEFORE UPDATE ON piezas
                FOR EACH ROW
                BEGIN
                    IF (NEW.qr_epoxi_prcss IS NOT NULL AND OLD.qr_epoxi_prcss IS NULL) OR
                    (NEW.qr_epoxi_prcss IS NULL AND OLD.qr_epoxi_prcss IS NOT NULL) OR
                    (NEW.qr_epoxi_prcss <> OLD.qr_epoxi_prcss) THEN
                        SET NEW.updated_qr_epoxi_prcss = CURRENT_TIMESTAMP;
                    END IF;
                END
            ');

            // Trigger para actualizar updated_kanban
            DB::statement('
                CREATE TRIGGER update_kanban_timestamp
                BEFORE UPDATE ON piezas
                FOR EACH ROW
                BEGIN
                    IF (NEW.kanban IS NOT NULL AND OLD.kanban IS NULL) OR
                    (NEW.kanban IS NULL AND OLD.kanban IS NOT NULL) OR
                    (NEW.kanban <> OLD.kanban) THEN
                        SET NEW.updated_kanban = CURRENT_TIMESTAMP;
                    END IF;
                END
            ');

            // Trigger para actualizar updated_qr_mounting_primer_prcss
            DB::statement('
                CREATE TRIGGER update_qr_mounting_primer_prcss_timestamp
                BEFORE UPDATE ON piezas
                FOR EACH ROW
                BEGIN
                IF (NEW.qr_mounting_primer_prcss IS NOT NULL AND OLD.qr_mounting_primer_prcss IS NULL) OR
                    (NEW.qr_mounting_primer_prcss IS NULL AND OLD.qr_mounting_primer_prcss IS NOT NULL) OR
                    (NEW.qr_mounting_primer_prcss <> OLD.qr_mounting_primer_prcss) THEN
                        SET NEW.updated_qr_mounting_primer_prcss = CURRENT_TIMESTAMP;
                END IF;
                END
            ');

            // Trigger para actualizar updated_qr_pin_assembly
            DB::statement('
                CREATE TRIGGER update_qr_pin_assembly_timestamp
                BEFORE UPDATE ON piezas
                FOR EACH ROW
                BEGIN
                    IF (NEW.qr_pin_assembly IS NOT NULL AND OLD.qr_pin_assembly IS NULL) OR
                    (NEW.qr_pin_assembly IS NULL AND OLD.qr_pin_assembly IS NOT NULL) OR
                    (NEW.qr_pin_assembly <> OLD.qr_pin_assembly) THEN
                        SET NEW.updated_qr_pin_assembly = CURRENT_TIMESTAMP;
                    END IF;
                END
            ');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('piezas');
        // Eliminar el trigger si se revierte la migración
        DB::statement('DROP TRIGGER IF EXISTS update_serial_number_timestamp');
        DB::statement('DROP TRIGGER IF EXISTS update_lot_timestamp');
        DB::statement('DROP TRIGGER IF EXISTS update_part_status_timestamp');
        DB::statement('DROP TRIGGER IF EXISTS update_tsbraket_timestamp');
        DB::statement('DROP TRIGGER IF EXISTS update_primer_timestamp');
        DB::statement('DROP TRIGGER IF EXISTS update_uretano_timestamp');
        DB::statement('DROP TRIGGER IF EXISTS update_primer_glass_timestamp');
        DB::statement('DROP TRIGGER IF EXISTS update_qr_out_tsbrake_timestamp');
        DB::statement('DROP TRIGGER IF EXISTS update_electrical_test_timestamp');
        DB::statement('DROP TRIGGER IF EXISTS update_qr_defogger_timestamp');
        DB::statement('DROP TRIGGER IF EXISTS update_wipper_timestamp');
        DB::statement('DROP TRIGGER IF EXISTS update_qr_wipper_timestamp');
        DB::statement('DROP TRIGGER IF EXISTS update_qr_epoxi_prcss_timestamp');
        DB::statement('DROP TRIGGER IF EXISTS update_kanban_timestamp');
        DB::statement('DROP TRIGGER IF EXISTS update_qr_mounting_primer_prcss_timestamp');
        DB::statement('DROP TRIGGER IF EXISTS update_qr_pin_assembly_timestamp');
    }
};
