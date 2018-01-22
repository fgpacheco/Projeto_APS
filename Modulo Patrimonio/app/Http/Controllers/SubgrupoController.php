<?php

namespace web\Http\Controllers;

use Illuminate\Http\Request;
use web\Subgrupo;
use web\Grupo;

class SubgrupoController extends Controller
{
     
    public function __construct() {
        $this->middleware('auth');
        
    }
    
    public function prepararAdicionar(){
        $grupo = Grupo::all();
        return view('subgrupo.adicionar') ->with('g',$grupo);
    }
    public function adicionar(Request $request){
        $subgrupo = new Subgrupo();
        $subgrupo -> descricao = $request -> descricao;
        $subgrupo->grupo_id = $request->grupo_id;
        $subgrupo -> save();
        return redirect('/patrimonio');
    }
    
    public function listar(){
        $subgrupo = Subgrupo::all();
        return view('subgrupo.listar');
    } 
}
