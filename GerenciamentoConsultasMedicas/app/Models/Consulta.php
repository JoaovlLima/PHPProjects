<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $fillable = [
        'Agendamento_id',
        'descricao',
        'status',
        'usuario_id'
    ];

    public function Agendamentos()
    {
        return $this->hasMany(Agendamento::class);
    }

    public function Agendamento()
    {
        return $this->belongsTo(Agendamento::class, 'Agendamento_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id'); // ou o nome da coluna de referência
    }
}
