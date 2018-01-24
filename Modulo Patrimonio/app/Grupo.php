<?php


namespace web;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    public function subgrupo(){
        return $this->hasMany('\web\Subgrupo');
    }
}
