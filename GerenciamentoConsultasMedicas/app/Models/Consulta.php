<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $fillable = [
        'Agendamento_id', 'descricao', 'status', 'usuario_id'
    ];

    public function Agendamentos()
    {
        return $this->hasMany(Agendamento::class);
    }
}
