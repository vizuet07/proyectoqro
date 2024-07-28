<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
        /**
        * Insersion de datos despues de la creacion de la tabla USER.
        */
        $usuario_dock =User::create([
            'name'=>'dock',
            'email'=>'dock@mail.com',
            'password'=>Hash::make('12345678')
        ]);
        $usuario_sospechoso =User::create([
            'name'=>'sospechoso',
            'email'=>'sospechoso@mail.com',
            'password'=>Hash::make('12345678')
        ]);
        $usuario_cuarentena=User::create([
            'name'=>'cuarentena',
            'email'=>'cuarentena@mail.com',
            'password'=>Hash::make('12345678')
        ]);
        $usuario_visualizacion=User::create([
            'name'=>'visualizacion',
            'email'=>'visualizacion@mail.com',
            'password'=>Hash::make('12345678')
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
