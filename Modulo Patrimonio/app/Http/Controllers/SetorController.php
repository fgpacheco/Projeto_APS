<?php

namespace web\Http\Controllers;

use web\Curso;
use web\Http\Requests\SetorRequest;
use web\Http\Requests\PesquisarRequest;
use web\Predio;
use web\Sala;
use web\Servidor;
use web\Setor;
use Request;

class SetorController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function novo()
    {
        $salas = Sala::all();
        $servidores = Servidor::all();
        $cursos = Curso::all();
        $predios = Predio::all();
        return view('setor.novo', ['salas' => $salas, 'servidores' => $servidores, 'cursos' => $cursos, 'predios' => $predios]);
    }

    public function salvar(SetorRequest $request)
    {
        $setor = new Setor();
        $setor->descricao = $request->descricao;
        $setor->curso_id = $request->curso_id;
        $setor->servidor_id = $request->servidor_id;

        $sala = Sala::where('descricao', 'like', strtolower($request->sala))->first();
        $predio = Predio::where('descricao', 'like', strtolower($request->predio))->first();

        //Uma sala de um predio diferente;
        $salaTemp = null;

        if($predio == null)
        {
            $predio = new Predio();
            $predio->descricao = $request->predio;
            $predio->save();

            if($sala != null)
            {
                //Cadastrando uma sala de um predio diferente.
                $salaTemp = new Sala();
                $salaTemp->descricao = $sala->descricao ;
                $salaTemp->predio_id = $predio->id;
                $salaTemp->save();
            }
        }

        if($sala == null)
        {
            $sala = new Sala();
            $sala->descricao = $request->sala;
            $sala->predio_id = $predio->id;
            $sala->save();
        }

        if($salaTemp != null)
            $setor->sala_id = $salaTemp->id;
        else
            $setor->sala_id = $sala->id;

        $setor->save();

        return redirect()
            ->action('SetorController@listar')
            ->withInput(Request::only('descricao'));
    }

    public function recuperar($id)
    {
        $setor = Setor::find($id);
        $salas = Sala::orderBy('descricao')->get();
        $servidores = Servidor::orderBy('nome')->get();
        $cursos = Curso::all();
        return view('setor.recuperar', ['setor' => $setor, 'salas' => $salas, 'servidores' => $servidores, 'cursos' => $cursos]);
    }

    public function alterar(SetorRequest $request)
    {
        $setor = Setor::find($request->id);
        $setor->descricao = $request->descricao;
        $setor->curso_id = $request->curso_id;
        $setor->servidor_id = $request->servidor_id;

        $sala = Sala::where('descricao', 'like', strtolower($request->sala))->first();
        $predio = Predio::where('descricao', 'like', strtolower($request->predio))->first();

        if($sala != null && $predio != null)
        {
            $sala->predio_id = $predio->id;
            $sala->update();
        }

        //Uma sala de um predio diferente;
        $salaTemp = null;

        if($predio == null)
        {
            $predio = new Predio();
            $predio->descricao = $request->predio;
            $predio->save();

            if($sala != null)
            {
                //Cadastrando uma sala de um predio diferente.
                $salaTemp = new Sala();
                $salaTemp->descricao = $sala->descricao ;
                $salaTemp->predio_id = $predio->id;
                $salaTemp->save();
            }
        }

        if($sala == null)
        {
            $sala = new Sala();
            $sala->descricao = $request->sala;
            $sala->predio_id = $predio->id;
            $sala->save();
        }

        if($salaTemp != null)
            $setor->sala_id = $salaTemp->id;
        else
            $setor->sala_id = $sala->id;

        $setor->update();
        return redirect()
            ->action('SetorController@listar')
            ->withInput($request->only('curso_id'));
    }

    public function remover($id)
    {
        $setor = Setor::find($id);
        $setor->delete();
        return redirect("setor/listar");
    }

    public function visualizar($id)
    {
        $setor = Setor::find($id);
        return view('setor.visualizar')->with('setor', $setor);
    }

    public function pesquisar(PesquisarRequest $request)
    {
        $setores = Setor::where('descricao', 'like', "%".$request->nome."%")->paginate(10);
        return view('setor.listar', ['setores' => $setores]);
    }

    public function listar()
    {
        $setores = Setor::orderBy('descricao')->paginate(10);
        return view('setor.listar', ['setores' => $setores]);
    }

    public function ordemAlfabetica() {
        $setores = Setor::orderBy('descricao')->paginate(10);
        return view('setor.listar')->withSetores($setores);
    }

    public function ordemCurso() {
        $setores = Setor::orderBy('curso_id')->paginate(10);
        return view('setor.listar')->withSetores($setores);
    }

}
