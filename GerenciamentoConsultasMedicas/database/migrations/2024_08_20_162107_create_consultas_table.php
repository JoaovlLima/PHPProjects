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
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Agendamento_id')->constrained('agendamentos')->
            onDelete('cascade');
            $table->string('descricao');
            $table->enum('status',['pendente','confirmado','concluida'])->default('pendente');
            $table->foreignId('usuario_id')->constrained('usuarios')->
            onDelete('cascade');
            $table->timestamps();
        });
    }
//  'Atendimento_id', 'descricao', 'status', 'paciente_id'
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas');
    }
};
