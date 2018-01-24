<?php
namespace web\Http\Controllers;

 use web\Http\Requests\SolicitacaoRequest;
 use web\Solicitacao;
 use web\Setor;
 use \web\Sala;
 use web\Predio;
 use web\Servidor;
 use \web\Curso;
use Illuminate\Support\Facades\Auth; 

class SolicitacaoController extends Controller
 
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function prepararAdicionar(SolicitacaoRequest $request){
         $setor = Setor::all();
         $salas = Sala::all();
         $predio = Predio::all();
         $servidor = Servidor::all();
         $curso = Curso::all();
         $user = Auth::user();
          
         //return Auth::user()->nome;
	return view('solicitacao.adicionar', ['setors' => $setor, 'salas' => $salas, 'predios'=>$predio, 'servidors'=>$servidor,'cursos'=>$curso, 'user'=>$user]); //->with('setors', $setor);
    
    }
    public function adicionar(SolicitacaoRequest $request) {
        $solicitacao = new Solicitacao();
        $solicitacao->nome = $request-> nome;
        $solicitacao->matricula = $request-> matricula;
        $solicitacao->cargo = $request-> cargo;
        $solicitacao->sala = $request-> sala;
        $solicitacao->predio = $request-> predio;
        $solicitacao->ramal = $request-> ramal;
        $solicitacao->curso = $request-> curso;
        $solicitacao->data = $request-> data;
        $solicitacao->descricao = $request-> descricao;
        $solicitacao->setor_id = $request->setor_id;
        $solicitacao->save();
        return redirect("solicitacao/listar");
}
    public function listar() {
        $solicitacao = Solicitacao::paginate(5);
        
       return view('solicitacao.listar')->withSolicitacao($solicitacao);
    }
     public function remover($id)
    {
        $solicitacao = Solicitacao::find($id);
        $solicitacao->delete();
        return redirect("solicitacao/listar");
    }
     public function visualizar($id)
    {
        $solicitacao = Solicitacao::find($id);
        return view('solicitacao.visualizar')->with('solicitacao', $solicitacao);
    }
}