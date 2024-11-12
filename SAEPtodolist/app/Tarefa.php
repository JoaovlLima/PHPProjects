<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;

    protected $table = 'tarefas';  // Nome da tabela, se necessário

    protected $fillable = [
        'titulo',
        'descricao',
        'data_criacao',
        'data_conclusao',
        'status_id',
        'setor_id',
    ];

    public $timestamps = true;

    // Relacionamentos
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }

    public function setor()
    {
        return $this->belongsTo(Setor::class, 'setor_id');
    }
}
