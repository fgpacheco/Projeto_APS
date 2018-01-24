<?php

namespace web;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function patrimonio(){
        return $this->belongsToMany('\web\Patrimonio');
    }
}
