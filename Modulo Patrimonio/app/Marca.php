<?php

namespace web;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table = 'marcas';
    protected $fillable = ['descricao'];
    
    public function patrimonio(){
        return $this->hasMany('\web\Patrimonio');
    }
}
