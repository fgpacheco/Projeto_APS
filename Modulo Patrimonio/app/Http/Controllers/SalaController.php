<?php
namespace web\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
use web\Sala;
use web\Predio;
use web\Http\Requests\SalaRequest;
use web\Http\Requests\PesquisarRequest;
use Illuminate\Pagination\LengthAwarePaginator;
class SalaController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        
    }
    
      public function listar()
    {
       $salas= Sala::paginate(10);
        return view('sala.listagem')->withSalas($salas);
    }
 
       
   
    public function mostra($id)
    {
        $sala = Sala::find($id);
        if(empty($sala)) {
            return "Esse Sala não existe";
        }
        return view('sala.detalhes')->with('d', $sala);
    }
    public function novo(){
        $predios = Predio::all();
        return view('sala.formulario')->with('predios',$predios);
    }
    public function muda($id){
        $sala = Sala::find($id);
        $predios = Predio::all();
        if(empty($sala)) {
            return "Esse Sala não existe";
        }
        return view('sala.form_alterar',['sala'=>$sala,'predios'=>$predios]);
    }
    
    public function adicionar(SalaRequest $request){
        Sala::create($request->all());
        return redirect()
            ->action('SalaController@listar')
            ->withInput(Request::only('descricao'));
        
    }
    public function atualizar(SalaRequest $request){
        Sala::find($request->input('id'))->update($request->all());
        return redirect()
        ->action('SalaController@listar')
        ->withInput(Request::only('sala'));
    }
    public function remover($id){
            $sala = Sala::find($id);
            $sala->delete();
            return redirect()->action('SalaController@listar');
        }
    public function pesquisar(PesquisarRequest $request) {
        $salas = Sala::where($request->filtro, 'like', "%" . $request->texto . "%")->orderBy('id')->paginate(10);
        return view('sala.listagem',['salas'=> $salas]);
    }
        
  //ORDENAR--------------------------------------------------------
  public function ordemAlfabetica() {
        $salas = Sala::orderBy('descricao')->paginate(10);
        return view('sala.listagem')->withSalas($salas);
    }

    }
