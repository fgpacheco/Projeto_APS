<?php
namespace web\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use web\Usuario;
use web\TipoUsuario;
class UsuarioController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    public function lista() {
        $usuarios = Usuario::paginate(5);
        return view('usuario.listagem')->withUsuarios($usuarios);
    }
 public function mostra($id)
 {
    $usuario = Usuario::find($id);
    if(empty($usuario)) {
        return "Esse Usuario não existe";
    }
    return view('usuario.detalhes')->with('u', $usuario);
}
    public function novo() {
        $tipousuario = TipoUsuario::all();
        if (empty($tipousuario)) {
            return view('auth/register')->with('tiposusuarios',null);
        }
        return view('auth/register')->with('tiposusuarios',$tipousuario);
    }
    public function muda($id) {
        $usuario = Usuario::find($id);
        if (empty($usuario)) {
            return "Esse Usuario não existe";
        }
        return view('usuario.form_alterar')->with('u', $usuario);
    }
    public function adiciona(Request $request) {
        $usuario = Usuario::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'departamento_id' => '1',
        ]);
        $usuario->tiposUsuarios()->attach($request->tipousuario);
        return redirect()->action('UsuarioController@lista');
    }
    public function alterar(UsuariosRequest $request) {
        Usuario::find($request->input('id'))->update($request->all());
        return redirect()
                        ->action('UsuarioController@lista')
                        ->withInput(Request::only('apelido'));
    }
    public function remove($id) {
        $usuario = usuario::find($id);
        $usuario->delete();
        return redirect()->action('UsuarioController@lista');
    }
    //
}