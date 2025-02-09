<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('nombre_usuario', 50)->unique();
            $table->string('contrasena_usuario', 255);
            $table->string('correo_usuario', 100)->unique();
            $table->unsignedBigInteger('id_rol');
            $table->timestamps();

            $table->foreign('id_rol')->references('id_rol')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
