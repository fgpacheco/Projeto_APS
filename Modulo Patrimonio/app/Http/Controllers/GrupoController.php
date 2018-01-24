<?php

namespace web\Http\Controllers;

use Illuminate\Http\Request;
use web\Grupo;

class GrupoController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth');
        
    }
    
    public function prepararAdicionar(){
        return view('grupo.adicionar');
    }
    
    public function adicionar(Request $request){
        $grupo = new Grupo();
        $grupo -> descricao = $request -> descricao;
        $grupo -> save();
        return redirect('/patrimonio');
    }
    
    public function listar(){
        $grupo = Grupo::all();
        return view('grupo.listar');
    } 
}
