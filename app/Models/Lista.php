<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    use HasFactory;
    protected $fillable = [
        'descricao',
        'mes',
        'ano',
        'user_id',

    ];


    public function usuario()
    {
        return $this->belongsToMany(Usuario::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
