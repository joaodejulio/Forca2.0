<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
    protected $fillable = [
        'pontuacao', 'id_palavra', 'id_usuario'
    ];

    
    public function getAll(){
    	$palavras= Partida::all();
    	return $palavras;
    }
}
