<?php

use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Role;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $role = Role::create(['name' => 'dock']);
        $role = Role::create(['name' => 'sospechoso']);
        $role = Role::create(['name' => 'cuarentena']);
        $role = Role::create(['name' => 'visualizacion']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
