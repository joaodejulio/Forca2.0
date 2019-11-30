<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'name'
    ];

    public function getAll(){
    	$categorias = Categoria::all();
    	return $categorias;
    }

}
