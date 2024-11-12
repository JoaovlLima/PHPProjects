<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';  // Nome da tabela, se necessário

    protected $fillable = [
        'nome',
        'email',
    ];

    public $timestamps = true;
}
