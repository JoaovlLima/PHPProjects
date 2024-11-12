<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    use HasFactory;

    protected $table = 'setores';  // Nome da tabela, se necessário

    protected $fillable = [
        'nome',  // Supondo que a tabela de setores tenha uma coluna 'nome'
    ];

    public $timestamps = true;
}
