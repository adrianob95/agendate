<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisicao extends Model
{
    use HasFactory;

    protected $fillable = [
   
        'indicacao',
        'procedimento',
        'usuario_id',
        'user_id',
        'datarecebido',
        'obs',
    ];


    public function situacao()
    {
        return $this->hasMany(Situacao::class);
    }

    public function latestSituacao()
    {
        return $this->hasOne(Situacao::class)->latestOfMany();
    }
    
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
