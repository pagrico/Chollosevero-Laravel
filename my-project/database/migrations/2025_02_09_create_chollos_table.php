<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('chollos', function (Blueprint $table) {
            $table->id('id_chollo');
            $table->unsignedBigInteger('id_usuario');
            $table->string('titulo_chollo', 100);
            $table->text('descripcion_chollo');
            $table->decimal('precio_chollo', 10, 2);
            $table->string('imagen_chollo', 255)->nullable();
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->timestamps();

            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chollos');
    }
};
