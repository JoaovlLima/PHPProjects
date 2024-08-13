<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable, HasFactory ;

    protected $fillable = [
        'nome', 'email', 'password', 'tipo', 'cnpj', 'nome_empresa'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function inscricoes()
    {
        return $this->hasMany(Inscricao::class);
    }


}
