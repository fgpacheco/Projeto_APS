<?php

namespace web\Http\Controllers;

use Illuminate\Http\Request;
use web\Marca;

class MarcaController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function prepararAdicionar(){
        return view('marca.adicionar');
    }
    
    public function adicionar(Request $request){
        $marca = new Marca();
        $marca -> descricao = $request -> descricao;
        $marca -> save();
        return redirect('/patrimonio');
    }
    
    public function listar(){
        $marca = Marca::all();
        return view('marca.listagem')->withMarca($marca);
    }
    
    
}
