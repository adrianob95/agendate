<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atendimento extends Model
{
    use HasFactory;
    protected $fillable = [
        'usuario_id',
        'user_id',
        'atendimento',
        'descricao',
    ];


    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
