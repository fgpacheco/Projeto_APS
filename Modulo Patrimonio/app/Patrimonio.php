<?php

namespace web;

use Illuminate\Database\Eloquent\Model;

class Patrimonio extends Model {

    protected $table = 'patrimonios';
    protected $fillable = ['descricao', 'valor', 'numeropatrimonio', 'numeropantigo', 'numeropregao', 'numeronotafiscal', 'numeroempenho', 'marca_id'];

    public function marca() {
        return $this->belongsTo('\web\Marca');
    }

    public function setor() {
        return $this->belongsToMany('\web\Setor');
    }

    public function subgrupo() {
        return $this->belongsTo('\web\Subgrupo');
    }

    public function status() {
        return $this->belongsToMany('\web\Status');
    }

    public function descarte() {
        return $this->belongsTo('\web\Descarte');
    }

}
