<?php

namespace web;

use Illuminate\Database\Eloquent\Model;

class Descarte extends Model
{
    
    protected $table = 'descartes';
    protected $fillable = ['motivo'];
    
    public function patrimonio() {
        return $this->hasMany('\web\Patrimonio');
    }
}
