<?php

namespace web;
use Illuminate\Database\Eloquent\Model;

class Subgrupo extends Model
{
    public function grupo(){
        return $this->belongsTo('\web\Grupo');
    }
    
    public function patrimonio(){
        return $this->hasMany('\web\Patrimonio');
    }
}
