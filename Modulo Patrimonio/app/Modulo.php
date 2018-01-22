<?php



namespace web;
use Illuminate\Database\Eloquent\Model;


class Modulo extends Model
{
    //
    protected $table ='modulos';
    
    protected $fillable = ['modulo'];
    
    public function permissoes(){
        return $this->hasMany('web\Permissao');
    }
    public function tiposUsuarios(){
        return $this->hasMany('web\TipoUsuario');
    }
}
