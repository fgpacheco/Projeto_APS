<?php

namespace web;
use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{

    protected $table ='tiposusuarios';
    
    protected $fillable = ['tipousuario', 'slug', 'permissions'];
    
    protected $casts = ['permissions' => 'array'];
    
    
    public function permissoes(){
        return $this->belongsToMany('web\Permissao');
    }
    public function modulo(){
        return $this->belongsTo('web\Modulo');
    }
    
    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class, 'tipousuariousuario');
    }

    public function hasAccess(array $permissions) 
    {
        foreach ($permissions as $permission) {     
            if ($this->hasPermission($permission)){
                return true;
            }
        }
        return false;
    }

    private function hasPermission($permission) 
    {
        return $this->permissions[$permission];
    }

}
