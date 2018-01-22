<?php

namespace web;
use Illuminate\Database\Eloquent\Model;

class Permissao extends Model
{
    //
    protected $table ='permissoes';
    
    protected $fillable = ['permissao'];
    
    public function tiposUsuarios(){
        return $this->belongsToMany('web\TipoUsuario');
    }
    public function modulo(){
        return $this->belongsTo('web\Modulo');
    }
}
