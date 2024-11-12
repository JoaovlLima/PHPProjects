<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = 'status';  // Nome da tabela, se necessário

    protected $fillable = [
        'nome',  // Supondo que a tabela de status tenha uma coluna 'nome'
    ];

    public $timestamps = true;
}
