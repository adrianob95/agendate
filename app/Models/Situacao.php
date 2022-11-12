<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Situacao extends Model
{
    use HasFactory;
     protected $fillable = [
        'situacao',
        'descricao',
        'data',
        'requisicao_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function requisicao()
    {
        return $this->belongsTo(Requisicao::class);
    }
}
