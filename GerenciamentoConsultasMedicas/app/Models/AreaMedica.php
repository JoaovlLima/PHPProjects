<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AreaMedica extends Model
{
    use HasFactory;

    protected $fillable = ['usuario_id', 'area'];

    // Relação com a tabela 'usuarios'
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class);
    }
}

