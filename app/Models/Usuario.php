<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cpf',
        'rg',
        'titulo',
        'email',
        'senha',
        'pai',
        'mae',
        'datanascimento',
        'endereco',
        'contato',
        'obs',
        'user_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
