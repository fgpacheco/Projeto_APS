<?php

namespace web;

use Illuminate\Database\Eloquent\Model;

class Solicitacao extends Model
{
     protected $fillable = [
        'nome','matricula','cargo','sala','predio','ramal','curso','data','descricao', 'setor_id'
    ];
    
    public function setor()
    {
        return $this->belongsTo('web\Setor');
    }
}
