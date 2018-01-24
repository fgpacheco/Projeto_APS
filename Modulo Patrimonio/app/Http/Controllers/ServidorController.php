<?php

namespace web\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use web\Http\Requests\ServidorRequest;
use web\Http\Requests\PesquisarRequest;
use \Illuminate\Database\QueryException;
use web\Servidor;
use Request;

class ServidorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function novo()
    {
        return view('servidor/novo');
    }

    public function salvar(ServidorRequest $request)
    {
        $servidor = new Servidor();
        $servidor->create($request->all());
        return redirect()
            ->action('ServidorController@listar')
            ->withInput(Request::only('nome'));
    }

    public function recuperar($id)
    {
        $servidor = Servidor::find($id);
        return view('servidor.recuperar')->with('servidor', $servidor);
    }

    public function alterar(ServidorRequest $request)
    {
        $servidor = Servidor::find($request->id);
        $servidor->update($request->all());
        return redirect()
            ->action('ServidorController@listar')
            ->withInput(Request::only('matricula'));
    }

    public function remover($id)
    {
        $servidor = Servidor::find($id);
        try {
            $servidor->delete();
        } catch (QueryException $e) {
            return view('servidor.mensagem_exclusao');
        }

        return redirect("/servidor/listar");
    }

    public function visualizar($id)
    {
        $servidor = Servidor::find($id);
        return view('servidor.visualizar')->with('servidor', $servidor);
    }

    public function pesquisar(PesquisarRequest $request)
    {
        $servidores = Servidor::where($request->filtro, 'like', "%".$request->nome."%")->paginate(10);
        return view('servidor/listar', ['servidores' => $servidores]);
    }

    public function listar()
    {
        $servidores = Servidor::paginate(10);
        return view('servidor/listar', ['servidores' => $servidores]);
    }

    public function ordemAlfabetica() {
        $servidores = Servidor::orderBy('nome')->paginate(10);
        return view('servidor.listar')->withServidores($servidores);
    }

    public function ordemMatricula() {
        $servidores = Servidor::orderBy('matricula')->paginate(10);
        return view('servidor.listar')->withServidores($servidores);
    }

    public function ordemCargo() {
        $servidores = Servidor::orderBy('cargo')->paginate(10);
        return view('servidor.listar')->withServidores($servidores);
    }

}
