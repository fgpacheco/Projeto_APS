<?php

namespace web;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model {

    protected $table = 'departamentos';
    protected $fillable = ['departamento'];

public function usuarios() {
      return $this->hasMany('web\Usuario');
   }

}
