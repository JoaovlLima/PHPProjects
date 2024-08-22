<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('area_medicas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id'); // Referencia ao usuário (médico)
            $table->string('area'); // Nome da área
            $table->timestamps();

            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('area_medicas');
    }
};
