<?php

namespace web;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = [
        'nome'
    ];

    public function setor()
    {
        return $this->hasMany('web\Setor');
    }


}
