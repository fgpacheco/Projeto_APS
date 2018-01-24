<?php

namespace web;

use Illuminate\Database\Eloquent\Model;
use web\Sala;

class Predio extends Model
{
    protected $fillable = ['descricao'];

    
    public function salas()
    {
        return $this->hasMany('web\Sala');   
    }

}
