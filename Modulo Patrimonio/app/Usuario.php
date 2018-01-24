<?php
namespace web;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Usuario extends Authenticatable
{
    use Notifiable;
    
    protected $table ='usuarios';
    
    protected $fillable = ['name','email','password','departamento_id'];
    
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function servidores()
    {
        return $this->hasMany('web\Servidor');
    }
    public function departamento() {
        return $this->belongsTo('web\Departamento');
    }
    
     public function tiposUsuarios()
    {
        return $this->belongsToMany(TipoUsuario::class, 'tipousuariousuario', 'usuario_id', 'tipousuario_id');
    }

    /**
     * Checks if User has access to $permissions.
     */
    public function hasAccess(array $permissions)
    {
        // check if the permission is available in any role
        foreach ($this->tiposUsuarios as $tipoUsuario) {
            if($tipoUsuario->hasAccess($permissions)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Checks if the user belongs to role.
     */
    public function inRole(string $roleSlug)
    {
        return $this->tiposUsuarios()->where('slug', $roleSlug)->count() == 1;
    }
     
}