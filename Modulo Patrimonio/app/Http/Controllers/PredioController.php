<?php

namespace web\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;
use web\Predio;
use web\Http\Requests\PredioRequest;


class PredioController extends Controller
{
    
    public function __construct() {
        
        $this->middleware('auth');
        
    }
    
    public function listar()
    {
        $predios= Predio::paginate(10);
        return view('predio.listagem')->withPredios($predios);
    }




    public function mostra($id)
    {

        $predio = Predio::find($id);
        if(empty($predio)) {
            return "Esse Predio não existe";
        }
        return view('predio.detalhes')->with('d', $predio);
    }


    public function novo(){

        return view('predio.formulario');

    }

    public function muda($id){
        $predio = Predio::find($id);
        if(empty($predio)) {
            return "Esse Predio não existe";
        }
        return view('predio.form_alterar')->with('predio', $predio);


    }



    public function adicionar(PredioRequest $request){

        Predio::create($request->all());
        return redirect()
            ->action('PredioController@listar')
            ->withInput(Request::only('descricao'));



    }

    public function atualizar(PredioRequest $request){
        Predio::find($request->input('id'))->update($request->all());
        return redirect()
            ->action('PredioController@listar')
            ->withInput(Request::only('descricao'));

    }


    public function remover($id){
        $predio = Predio::find($id);
        $predio->delete();
        return redirect()->action('PredioController@listar');
    }
public function pesquisar(PredioRequest $request) {
        $predios = Predio::where($request->filtro, 'like', "%" . $request->texto . "%")->orderBy('id')->paginate(10);
        return view('predio.listagem')->withPredios($predios);
    }
        
  //ORDENAR--------------------------------------------------------
  public function ordemAlfabetica() {
        $predios = Predio::orderBy('descricao')->paginate(10);
        return view('predio.listagem')->withPredios($predios);
    }
}
