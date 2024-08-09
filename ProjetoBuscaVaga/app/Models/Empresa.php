<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Empresa extends Authenticatable
{
    use Notifiable, HasFactory ;

    protected $fillable = [
        'nome', 'email', 'password', 'empresa_nome', 'empresa_descricao'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Vagas()
    {
        return $this->hasMany(Vaga::class);
    }
}
