<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Palavra extends Model
{
    public function categoria(){
        return $this->hasOne('App\Categoria');
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'categoria_id'
    ];

    
    public function getAll(){
    	$palavras= Palavra::all();
    	return $palavras;
    }
    
}
