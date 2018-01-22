<?php

namespace web\Http\Controllers;

use web\Patrimonio;
use web\Marca;
use web\Grupo;
use web\Subgrupo;
use web\Setor;
use web\Sala;
use web\Http\Requests\PatrimonioRequest;
use web\Http\Requests\PesquisarRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class PatrimonioController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function listar() {
        $patrimonio = Patrimonio::where('descarte_id', null)->paginate(10);
        return view('patrimonio.listagem')->withPatrimonio($patrimonio);
    }

    public function prepararAdicionar() {
        return view('patrimonio.adicionar');
    }

    public function pesquisar(PesquisarRequest $request) {
        $patrimonio = Patrimonio::where($request->filtro, 'like', "%" . $request->texto . "%")->orderBy('id')->paginate(10);
        return view('patrimonio.listagem')->withPatrimonio($patrimonio);
    }

    public function adicionar(PatrimonioRequest $request) {
        $patrimonio = new Patrimonio();
        $marca = Marca::where('descricao', 'like', strtolower($request->marca))->first();
        $subgrupo = Subgrupo::where('descricao', 'like', strtolower($request->subgrupo))->first();
        $grupo = Grupo::where('descricao', 'like', strtolower($request->grupo))->first();
        $patrimonio->descricao = $request->descricao;
        $patrimonio->valor = $request->valor;
        $patrimonio->numeroempenho = $request->numeroempenho;
        $patrimonio->numeropatrimonio = $request->numeropatrimonio;
        $patrimonio->numeropregao = $request->numeropregao;
        $patrimonio->numeropantigo = $request->numeropantigo;
        $patrimonio->numeronotafiscal = $request->numeronotafiscal;
        $patrimonio->dataaquisicao = $request->dataaquisicao;

        if ($marca == null) {
            $marca = new Marca();
            $marca->descricao = $request->marca;
            $marca->save();
        }
        if ($grupo == null) {
            $grupo = new Grupo();
            $subgrupo = new Subgrupo();
            $grupo->descricao = $request->grupo;
            $grupo->save();
            $subgrupo->descricao = $request->subgrupo;
            $subgrupo->grupo_id = $grupo->id;
            $subgrupo->save();
        }
        if ($grupo != null) {
            if ($subgrupo == null) {
                $subgrupo = new Subgrupo();
                $subgrupo->descricao = $request->subgrupo;
                $subgrupo->grupo_id = $grupo->id;
                $subgrupo->save();
            }
        }
        $patrimonio->marca_id = $marca->id;
        $patrimonio->subgrupo_id = $subgrupo->id;
        $patrimonio->save();
        $patrimonio->status()->attach(1, ['data' => $request->dataaquisicao]);
        return redirect("patrimonio/");
    }

    public function editar(Request $request) {
        $patrimonio = Patrimonio::find($request -> id);
        return view('patrimonio.editar')->with('p', $patrimonio);
    }

    public function atualizar(PatrimonioRequest $request) {
        $patrimonio = Patrimonio::find($request->id);
        $marca = Marca::where('descricao', 'like', strtolower($request->marca))->first();
        $subgrupo = Subgrupo::where('descricao', 'like', strtolower($request->subgrupo))->first();
        $grupo = Grupo::where('descricao', 'like', strtolower($request->grupo))->first();
        $patrimonio->descricao = $request->descricao;
        $patrimonio->valor = $request->valor;
        $patrimonio->numeroempenho = $request->numeroempenho;
        $patrimonio->numeropatrimonio = $request->numeropatrimonio;
        $patrimonio->numeropregao = $request->numeropregao;
        $patrimonio->numeropantigo = $request->numeropantigo;
        $patrimonio->numeronotafiscal = $request->numeronotafiscal;
        $patrimonio->dataaquisicao = $request->dataaquisicao;

        if ($marca == null) {
            $marca = new Marca();
            $marca->descricao = $request->marca;
            $marca->save();
        }
        if ($grupo == null) {
            $grupo = new Grupo();
            $subgrupo = new Subgrupo();
            $grupo->descricao = $request->grupo;
            $grupo->save();
            $subgrupo->descricao = $request->subgrupo;
            $subgrupo->grupo_id = $grupo->id;
            $subgrupo->save();
        }
        if ($grupo != null) {
            if ($subgrupo == null) {
                $subgrupo = new Subgrupo();
                $subgrupo->descricao = $request->subgrupo;
                $subgrupo->grupo_id = $grupo->id;
                $subgrupo->save();
            }
        }
        $patrimonio->marca_id = $marca->id;
        $patrimonio->subgrupo_id = $subgrupo->id;
        $patrimonio->update();
        return redirect("patrimonio/");
    }

    public function visualizar(Request $request) {
        $patrimonio = Patrimonio::find($request -> id);
        $teste = $patrimonio->status->last();
        return view('patrimonio.visualizar')->with('patrimonio', $patrimonio)->with('teste', $teste);
    }

    public function prepararTransferir(Request $request) {
        $patrimonio = Patrimonio::find($request->id);
        $setor = \web\Setor::all();
        $status = \web\Status::all();
        return view('patrimonio.transferir')->with('p', $patrimonio)->with('s', $setor)->with('st', $status);
    }

    public function transferir(Request $request) {
        $patrimonio = Patrimonio::find($request->id);
        $patrimonio->setor()->attach($request->setor_id, array('dataaquisicao' => $request->dataaquisicao));
        $patrimonio->status()->attach($request->status_id, ['data' => $request->dataaquisicao]);
        return redirect("patrimonio/");
    }

    public function ordemAlfabetica() {
        $patrimonio = Patrimonio::orderBy('descricao')->paginate(10);
        return view('patrimonio.listagem')->withPatrimonio($patrimonio);
    }

    public function ordemNumeroPatrimonio() {
        $patrimonio = Patrimonio::orderBy('numeropatrimonio')->paginate(10);
        return view('patrimonio.listagem')->withPatrimonio($patrimonio);
    }

    public function ordemNumeroEmpenho() {
        $patrimonio = Patrimonio::orderBy('numeroempenho')->paginate(10);
        return view('patrimonio.listagem')->withPatrimonio($patrimonio);
    }

    public function historico($id) {
        $patrimonio = DB::select("SELECT DISTINCT patrimonios.descricao as nomep, setors.descricao as nomesetor, statuses.descricao, patrimonio_status.data "
                                . "FROM setors, patrimonios, patrimonio_setor, statuses, patrimonio_status "
                                . "WHERE patrimonio_status.patrimonio_id = patrimonios.id and patrimonio_status.status_id = statuses.id and patrimonios.id =" . $id . " and patrimonio_setor.patrimonio_id = patrimonios.id and setors.id = patrimonio_setor.setor_id");
        return view('patrimonio.historico')->with('patrimonio', $patrimonio);
    }
    
    public function prepararDevolucao(Request $request) {
        $patrimonio = Patrimonio::find($request->id);
        $setor = \web\Setor::all();
        $status = \web\Status::all();
        $query = DB::select("SELECT p.patrimonio_id, p.status_id FROM patrimonio_status p, patrimonios "
                . "WHERE patrimonios.id = p.patrimonio_id and patrimonios.id = 1 and p.id = (SELECT MAX(id) from projetoweb.patrimonio_status)");
        return view('patrimonio.devolucao')->with('p', $patrimonio)->with('s', $setor)->with('st', $status)->with('q', $query);
    }
    
    public function devolucao(Request $request){
        $patrimonio = Patrimonio::find($request->id);
        $patrimonio->setor()->attach($request->setor_id, ['dataAquisicao'=> $request->datadevolucao]);
        $patrimonio->status()->detach();
        $patrimonio->status()->attach($request->status_id, ['data' => $request->datadevolucao]);
        return redirect("patrimonio/");
//        return $request->status_id;
    }
    
    public function prepararDescarte($id){
        $patrimonio = Patrimonio::find($id);
        $descarte = \web\Descarte::all();
        return view('patrimonio.descarte')->with('patrimonio', $patrimonio)->with('descarte', $descarte);
    }
    
    public function descarte(Request $request){
        $patrimonio = Patrimonio::find($request-> id);
        $patrimonio -> descarte_id = $request -> motivo;
        $patrimonio->update();
        $patrimonio->status()->attach(4, ['data' => $request->data]);
        
        return redirect("patrimonio/");
    }

    public function relatorioTodos() {
        $patrimonio = Patrimonio::paginate(30);
        return view('relatorio.relatorioTodos')->with('patrimonio', $patrimonio);
    }

    public function relatorioSetor(Request $request) {
        $setor = Setor::all();
        $query = DB::select("SELECT DISTINCT patrimonios.descricao as nomep, patrimonios.numeropatrimonio, setors.descricao FROM patrimonios, patrimonio_setor, setors "
                        . "WHERE  patrimonios.id = patrimonio_setor.patrimonio_id and setors.id = patrimonio_setor.setor_id and setors.descricao = " . "'".$request -> setor."'"  ."");
       
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $col = new \Illuminate\Database\Eloquent\Collection($query);
        $perPage = 15;        
        $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $patrimonio = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);
        
        return view('relatorio.relatorioSetor')->with('patrimonio', $patrimonio)->with('setors', $setor);
    }

    public function relatorioSala(Request $request) {
        $sala = Sala::all();
        $query = DB::select("SELECT DISTINCT patrimonios.descricao as nomep, patrimonios.numeropatrimonio, patrimonios.dataaquisicao FROM patrimonios, patrimonio_setor, setors, salas "
                        . "WHERE  patrimonios.id = patrimonio_setor.patrimonio_id and setors.id = patrimonio_setor.setor_id and salas.descricao = " . "'".$request -> sala."'". " and salas.id = setors.sala_id");   
        
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $col = new \Illuminate\Database\Eloquent\Collection($query);
        $perPage = 15;        
        $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $patrimonio = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);
        return view('relatorio.relatorioSala')->with('patrimonio', $patrimonio)->with('sala', $sala);

    }
 
    public function relatorioNotaFiscal(Request $request) {
        $patrimonio = Patrimonio::where('numeronotafiscal', '=', $request -> numero)->paginate(15);
        return view('relatorio.relatorioNotaFiscal')->with('patrimonio', $patrimonio);
    }
    
    public function relatorioEmpenho(Request $request){
        $patrimonio = Patrimonio::where('numeroempenho', '=', $request -> numero)->paginate(15);
        return view('relatorio.relatorioEmpenho')->with('patrimonio', $patrimonio);
    }
    
    public function listarDescartados() {
        $patrimonio = Patrimonio::where('descarte_id','!=', null)->paginate(10);
        return view('patrimonio.listagemDescarte')->withPatrimonio($patrimonio);
        
    }  
    
}