<?php
namespace web\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
use web\Departamento;
use web\Http\Requests\DepartamentoRequest;
class DepartamentoController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
      public function lista()
    {
       $departamentos= Departamento::paginate(5);
        return view('departamento.listagem')->withDepartamentos($departamentos);
    }
 
       
   
    
    public function novo(){
        return view('departamento.formulario');
    }
    public function muda($id){
        $departamento = Departamento::find($id);
        if(empty($departamento)) {
            return "Esse Departamento não existe";
        }
        return view('departamento.form_alterar')->with('d', $departamento);
    }
    
    public function adiciona(DepartamentoRequest $request){
        Departamento::create($request->all());
       
       return redirect('/usuario/novo');
        
    }
    public function alterar(DepartamentoRequest $request){
        
        Departamento::find($request->input('id'))->update($request->all());
        return redirect()
        ->action('DepartamentoController@lista')
        ->withInput(Request::only('departamento'));
    }
}