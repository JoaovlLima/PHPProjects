<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'nome', 'cpf', 'password','tipo', 'crm'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isPaciente()
    {
        return $this->tipo ==='paciente';
    }
   public function isMedico()
    {
        return $this->tipo === 'medico';
    }

    public function Agendamentos()
    {
        return $this->hasMany(Agendamento::class);
    }
    public function Consultas()
    {
        return $this->hasMany(Consulta::class,'usuario_id');
    }
    public function areaMedicas()
    {
        return $this->hasMany(AreaMedica::class);
    }


}
