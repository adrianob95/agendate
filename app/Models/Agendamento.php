<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;
    protected $fillable = [
        'descricao',
        'data',
        'hora',
        'usuario_id',
        'user_id',
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
