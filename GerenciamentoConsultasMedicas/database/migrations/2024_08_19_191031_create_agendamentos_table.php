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
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id();
            $table->timestamp('data_hora');
            $table->foreignId('usuario_id')->constrained('usuarios')->
            onDelete('cascade');
            $table->string('area');
            $table->boolean('disponivel')->default('disponivel');
            $table->timestamps();
        });
    }
// 'data_hora', 'medico_id', 'area','disponivel'
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendamentos');
    }
};
