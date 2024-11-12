<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kanban extends Model
{
    use HasFactory;

    protected $table = 'kanbans';  // Nome da tabela, se necessário

    protected $fillable = [
        'nome', // Supondo que tenha um campo 'nome'
        'descricao', // Supondo que tenha um campo 'descricao'
    ];

    public $timestamps = true;

    // Relacionamento com tarefas (se um kanban tiver muitas tarefas)
    public function tarefas()
    {
        return $this->hasMany(Tarefa::class, 'kanban_id');  // Supondo que a tabela de tarefas tenha um campo 'kanban_id'
    }
}
